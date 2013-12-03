<?php

namespace org\filterswept\DataStructures;

class LinkListNode {
	private $payload = null;
	private $next = null;

    public function __construct($payload) {
        $this->payload = $payload;
    }    

    public function __get($name) {
        return $this->$name;
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }
}

class LinkList {
    private $list = null;

    public function addFront($data) {
        $node = new LinkListNode($data);

        $node->next = $this->list;
        $this->list = $node;
    }

    public function addTail($data) {
        $node = new LinkListNode($data);

        if ($this->list == null) {
            $this->list = $node;
            return;
        }

        $iterate = $this->list;
        while($iterate->next) {
            $iterate = $iterate->next;
        }
        $iterate->next = $node;
    }

    public function remove($data) {
        if ($this->list == null) {
            return null;
        }

        if ($this->list->payload === $data) {
            $result = $this->list;
            $this->list = $this->list->next;

            $result->next = null;
            return $result;
        }

        $parent = $this->list;
        $iterate = $this->list->next;
        while ($iterate) {
            if ($iterate->payload === $data) {
                $result = $iterate;
                $parent->next = $iterate->next;
                $result->next = null;
                return $result;
            }

            $parent = $iterate;
            $iterate = $iterate->next;
        }

        return null;
    }

    public function getIndex($index) {
        $iterate = $this->list;

        while ($iterate) {
            if ($index < 0) {
                return null;
            }
            if ($index == 0) {
                return $iterate;
            }
            $iterate = $iterate->next;
            $index--;
        }
        return null;
    }

    // expensive!
    public function removeIndex($index) {
        $data = $this->getIndex($index);

        if ($data == null) {
            return null;
        }

        return $this->remove($data->payload);
    }
}

?>