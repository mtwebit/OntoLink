<?php

class OntoLinkConfig extends ModuleConfig {

  public function getDefaults() {
    return array(
      'fields' => 'body',
      'ontotype' => 'person'
    );
  }

  public function getInputfields() {
    $inputfields = parent::getInputfields();

    $f = $this->modules->get('InputfieldSelectMultiple');
    $f->attr('name', 'fields');
    $f->label = 'Text fields to process';
    $f->options = array();
    foreach ($this->wire('fields') as $field) {
      //if (!$field->type instanceof FieldtypeTextArea) continue;
      if (!$field->type instanceof FieldtypeText) continue;
      $f->addOption($field->name, $field->label);
    }
    $inputfields->add($f);

    $f = $this->modules->get('InputfieldSelect');
    $f->attr('name', 'ontotype');
    $f->label = 'Templates to link to';
    $f->options = array();
    foreach($this->wire('templates') as $template) {
      if ($template->hasField('known_as')) {
        $f->addOption($template->name, $template->name);
      }
    }
    $inputfields->add($f);

    return $inputfields;
  }
}
?>
