<?php

namespace Give\Framework\FieldsAPI\FieldCollection;

use Give\Framework\FieldsAPI\FieldCollection;

/**
 * Stores an reference to the node being moved for a fluent API.
 * Combines `remove` and `insert*` methods for a declarative API.
 */
class MoveNodeProxy {

	/** @var FieldCollection */
	protected $collection;

	/** @var Node */
	protected $targetNode;

	/**
	 * @param FieldCollection $collection
	 */
	public function __construct( FieldCollection &$collection ) {
		$this->collection = $collection;
	}

	/**
	 * @param Node $node
	 */
	public function move( $node ) {
		$this->targetNode = $node;
	}

	/**
	 * @param string $name The name of the node after which the target node should be inserted.
	 */
	public function after( $name ) {
		$this->collection->remove( $this->targetNode->getName() );
		$this->collection->insertAfter( $name, $this->targetNode );
	}

	/**
	 * @param string $name The name of the node before which the target node should be inserted.
	 */
	public function before( $name ) {
		$this->collection->remove( $this->targetNode->getName() );
		$this->collection->insertBefore( $name, $this->targetNode );
	}
}
