<?php

/**
 * This file is part of the Nextras\ORM library.
 *
 * @license    MIT
 * @link       https://github.com/nextras/orm
 * @author     Jan Skrasek
 */

namespace Nextras\Orm\Entity;

use Nextras\Orm\Entity\Collection\IEntityPreloadContainer;
use Nextras\Orm\Entity\Fragments\DataEntityFragment;
use Nextras\Orm\NotSupportedException;


/**
 * @property int|NULL $id
 */
class Entity extends DataEntityFragment implements IEntity
{
	/** @var IEntityPreloadContainer */
	private $preloadContainer;


	public function setPreloadContainer(IEntityPreloadContainer $overIterator = NULL)
	{
		$this->preloadContainer = $overIterator;
		return $this;
	}


	public function getPreloadContainer()
	{
		return $this->preloadContainer;
	}


	public function & __get($name)
	{
		$var = $this->getValue($name);
		return $var;
	}


	public function __set($name, $value)
	{
		$this->setValue($name, $value);
	}


	public function __isset($name)
	{
		return $this->hasValue($name);
	}


	public function __unset($name)
	{
		throw new NotSupportedException;
	}


	public function __clone()
	{
		parent::__clone();
		$this->preloadContainer = NULL;
	}


	public function serialize()
	{
		return serialize(parent::serialize());
	}


	public function unserialize($serialized)
	{
		parent::unserialize(unserialize($serialized));
	}

}
