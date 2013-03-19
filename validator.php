<?php
 
class Validator extends Laravel\Validator {

	/**
	 * Stores passed attribute labels
	 *
	 * @var array
	 */
	public $attribute_labels = array();

	/**
	 * Manually set attribute labels for fields
	 *
	 * @param  array  $attribute_labels
	 * @return Validator
	 */
	public function with_labels($attribute_labels = array()) {
		$this->attribute_labels = array_merge($this->attribute_labels, $attribute_labels);
		return $this;
	}

	/**
	 * Clear all set attribute labels for this instance
	 *
	 * @param  array  $attribute_labels
	 * @return Validator
	 */
	public function clear_labels($attribute_labels = array()) {
		$this->attribute_labels = array();
		return $this;
	}

	/**
	 * Get the displayable name for a given attribute.
	 *
	 * @param  string  $attribute
	 * @return string
	 */
	protected function attribute($attribute) {

		// First try the labels that were manually given
		if (isset($this->attribute_labels[$attribute])) return $this->attribute_labels[$attribute];

		// Not found? Keep calm and carry on as usual
		return parent::attribute($attribute);
	}
}