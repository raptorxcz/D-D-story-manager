<?php
class FormView extends View {
  
  public $sendTitle = 'Odeslat';
  public $content;
  
  function __toString() {
    $form = new ElementView('form');
    $form->attributes = array(
      'method' => 'post',
    );
    
    $button = new ElementView('input');
    $button->attributes = array(
      'name' => 'submit',
      'value' => $this->sendTitle,
      'type' => 'submit',
    );

    $form->content = $this->content.$button;
    
    return (string)$form;
  }
  
}

?>
