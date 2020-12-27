<?php

namespace App\Foundation;

use App\Foundation\ModelTrait\HasAttributesTraitInterface;
use App\Foundation\ModelTrait\HaveTimestampModelTraitInterface;

interface BaseModelInterface extends HasAttributesTraitInterface, HaveTimestampModelTraitInterface
{
}
