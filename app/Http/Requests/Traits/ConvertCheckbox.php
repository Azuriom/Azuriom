<?php

namespace Azuriom\Http\Requests\Traits;

trait ConvertCheckbox
{
    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->mergeCheckboxes();
    }

    protected function mergeCheckboxes(): void
    {
        $attribute = [];

        foreach ($this->checkboxes as $checkbox) {
            $attribute[$checkbox] = $this->has($checkbox);
        }

        $this->merge($attribute);
    }
}
