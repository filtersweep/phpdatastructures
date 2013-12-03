<?php

namespace org\filterswept\DataStructures;

class BinaryTreeNode {
    private $payload = null;
    private $left = null;
    private $right = null;

    public function __construct($payload) {
        $this->payload = $payload;
    }

    public function __get($name) {
        return $this->$name;
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }

    protected function &getSortDirection($data) {
        if ($data > $this->payload) {
            return $this->right;
        } 
        return $this->left;
    }

    public function add($data) {
        $childref = $this->getSortDirection($data);

        if ($childref == null) {
            $childref = new $this($data);
        } else {
            $childref->add($data);
        }
    }

    public function remove($data) {
        $childref = $this->getSortDirection($data);

        if ($childref->payload == $data) {
            $result = $childref;
            $childref = null;
            return $result;
        }

        $childref->remove($data);
    }

    public function find($data) {
    }
}

class BinaryTreeNodeFactory {
    public static function makeNewNode($data) {
        return new BinaryTreeNode($data);
    }
}

class BinaryTree {
    private $root = null;

    public function add($data) {
        if ($this->root == null) {
            $this->root = BinaryTreeNodeFactory::makeNewNode($data);
        } else {
            $this->root->add($data);
        }
    }

    public function remove($data) {
        if ($this->root != null) {
            if ($this->root->payload === $data) {
                $result = $this->root;
                $this->root = null;
                return $result;
            }

            return $this->root->remove($data);
        }
        return null;
    }

    public function find($data) {
        if ($this->root != null) {
            return null;
        }

        return $this->root->find($data);
    }
}

?>