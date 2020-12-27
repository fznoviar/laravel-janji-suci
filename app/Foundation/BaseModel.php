<?php

namespace App\Foundation;

use App\Foundation\ModelTrait\HaveTimestampModelTrait;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model implements BaseModelInterface
{
    use HaveTimestampModelTrait;

    /**
     * @inheritDoc
     */
    public function setAttributes(array $attributes)
    {
        foreach ($attributes as $attribute => $value) {
            $this->setAttribute($attribute, $value);
        }

        return $this;
    }
}
