<?php

class Node
{
    public $data = null;
    public $next = null;

    public function __construct(string $data = null)
    {
        $this->data = $data;
    }
}

class LinkedList
{
    private $_firstNode = null;
    private $_totalNodes = 0;

    public function insert(string $data = null)
    {
        $newNode = new Node($data);

        if ($this->_firstNode == null)
        {
            $this->_firstNode = &$newNode;
        }
        else 
        {
            $currentNode = $this->_firstNode;

            while ($currentNode->next !== null)
            {
                $currentNode = $currentNode->next;
            }

            $currentNode->next = &$newNode;    
        }

        $this->_totalNodes++;
    }

    public function display()
    {
        if ($this->_firstNode)
        {
            $currentNode = $this->_firstNode;
            echo "total nodes: " . $this->_totalNodes . "\n";
            while ($currentNode !== null)
            {
                echo $currentNode->data . "\n";
                $currentNode = $currentNode->next;
            }
        }
        else 
        {
            echo "no nodes to display";
        }
    }

    public function search(string $query = null)
    {
        if ($this->_totalNodes)
        {
            $currentNode = $this->_firstNode;

            while ($currentNode !== null)
            {
                if ($currentNode->data == $query)
                {
                    echo "Found\n";
                    return true;
                }
                $currentNode = $currentNode->next;
            }
            echo "Not Found\n";
            return false;
        }

    }

    public function insertFirst(string $data = null)
    {
        $newNode = new Node($data);

        if ($this->_firstNode == null)
        {
            $this->_firstNode = &$newNode;
        }
        else 
        {
            $currentNode = $this->_firstNode;
            $this->_firstNode = &$newNode;
            $newNode->next = $currentNode;     
        }
        $this->_totalNodes++;
    }

    public function insertBefore(string $data = null, string $query = null)
    {
        $newNode = new Node($data);

        if ($this->_firstNode == null)
        {
            $this->_firstNode = &$newNode;
        }
        else 
        {
            $currentNode = $this->_firstNode;
            $previous = null;

            while ($currentNode !== null)
            {
                if ($currentNode->data == $query)
                {
                    $newNode->next = $currentNode;
                    $previous->next = $newNode;
                    return true;
                }
                $previous = $currentNode;
                $currentNode = $currentNode->next;
            }
        }
        $this->_totalNodes++;
    }

    public function insertAfter(string $data = null, string $query = null)
    {
        $newNode = new Node($data);

        if ($this->_firstNode)
        {
            $currentNode = $this->_firstNode;
            $nextNode = null;

            while ($currentNode !== null)
            {
                if ($currentNode->data == $query)
                {
                    if ($nextNode !== null)
                    {
                        $newNode->next = $nextNode;
                    }
                    $currentNode->next = $newNode;
                    $this->_totalNodes++;
                    break;
                }
                $currentNode = $currentNode->next;
                $nextNode = $currentNode->next;
            }
        }
    }

    public function deleteFirst()
    {
        if ($this->_firstNode !== null)
        {
            if ($this->_firstNode->next !== null)
            {
                $this->_firstNode = $this->_firstNode->next;
            }
            else 
            {
                $this->_firstNode = null;
            }
            $this->_totalNodes--;
            return true;
        }
        return false;
    }
}

$linkedList = new LinkedList();
$linkedList->insert('Arrays');
$linkedList->insert('Linked List');
$linkedList->insert('Queues');
// $linkedList->search('Linked List');
$linkedList->insertFirst('Strings');
$linkedList->insertBefore('Stack', 'Queues');
$linkedList->insertAfter('Graphs', 'Linked List');
$linkedList->deleteFirst();
$linkedList->display();
