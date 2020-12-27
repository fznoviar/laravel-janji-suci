<?php

namespace App\Foundation\ModelTrait;

interface HasAttributesTraitInterface
{
    /**
     * Set a given attribute on the model.
     *
     * @param string $key
     * @param mixed  $value
     *
     * @return mixed
     */
    public function setAttribute($key, $value);

    /**
     * @param array $attributes
     *
     * @return mixed
     */
    public function setAttributes(array $attributes);

    /**
     * Get an attribute from the model.
     *
     * @param  string  $key
     * @return mixed
     */
    public function getAttribute($key);
}
