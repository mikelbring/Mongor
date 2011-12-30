<?php namespace Mongor;

class Hydrator {

	public static function hydrate($mongor, $results)
	{
		return static::base(get_class($mongor), $results);
	}

	private static function base($class, $results)
	{
		$models = array();

		foreach ($results as $result)
		{
			$model = new $class;

			$model->attributes = (array) $result;

			$model->exists = true;

			if (isset($model->attributes['_id']))
			{
				$id = (string) $model->attributes['_id'];

				$models[$id] = $model;
			}
			else
			{
				$models[] = $model;
			}
		}

		return $models;
	}

}
