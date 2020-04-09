function verif_formulaire()
{
    if (document.inscription.password.value != document.inscription.confirmpassword.value)
    {
        alert("Veuillez saisir un mot de passe identique ");
        return false;
    }
}
