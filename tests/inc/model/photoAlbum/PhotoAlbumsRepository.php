<?php

namespace NextrasTests\Orm;

use Nextras\Orm\Repository\Repository;


/**
 * @method PhotoAlbum|NULL getById($id)
 */
final class PhotoAlbumsRepository extends Repository
{
	static function getEntityClassNames(): array
	{
		return [PhotoAlbum::class];
	}
}
