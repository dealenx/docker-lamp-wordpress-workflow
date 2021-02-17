<?php

class CalderaHelper
{
    function __construct($form_id)
    {

        $this->form = Caldera_Forms_Forms::get_form($form_id);
        //Basic entry information
        $entryDetials = new Caldera_Forms_Entry_Entry();
        $entryDetials->form_id = $this->form['ID'];
        $entryDetials->datestamp = current_time('mysql');
        $entryDetials->user_id = 0;
        $entryDetials->status = 'pending';
        //Create entry object
        $this->entry = new Caldera_Forms_Entry(
            $this->form,
            false,
            $entryDetials
        );
    }

    function add_value_field($field_slug, $field_value)
    {
        $field = Caldera_Forms_Field_Util::get_field_by_slug($field_slug, $this->form);
        //Create field value object
        $fieldEntryValue = new Caldera_Forms_Entry_Field();
        //Associate it with this field
        $fieldEntryValue->field_id = $field['ID'];
        $fieldEntryValue->slug = $field['slug'];
        //Set the value to save.
        $fieldEntryValue->value =  $field_value;
        //Add field to entry
        $this->entry->add_field($fieldEntryValue);
    }

    function send_entry()
    {
        $this->entry->save();

        $this->entry->update_status('active');

    }
}
