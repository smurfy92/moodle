// Inclusion de la classe dont on hérite.
require_once ($CFG->dirroot.'/course/moodleform_mod.php');

// Définition de notre classe qui hérite de moodleform (formslib).
class mod_MODULE_NAME_MY_PAGE_form extends moodleform 
{
	// Définition du formulaire
	function definition()
	{
		$mform =& $this->_form;
		
		/* Entête du formulaire */
		$mform->addElement('header', 'header1',
		get_string('header1', 'MODULE_NAME'));
		
		/* Un champ de texte */
		$mform->addElement('text', 'textfield1',
		get_string('textfield1', 'MODULE_NAME'), array('size'=>'64'));
		
		/* Ajout d'un contrôle de saisie. Ce champ est obligatoire. */
		$mform->addRule('textfield1', get_string('required'),
		'required', null, 'client');

		// Bouton enregistrement et annulation standard
		$this->add_action_buttons();
	}

	// Validation du formulaire. Permet d'ajouter des contrôles de saisie supplémentaires et plus compliqués que avec addRule().
	function validation($data)
	{
		$errors= array();
		return $errors;
	}
}
