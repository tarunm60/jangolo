$(document).ready(function(){
//au clic sur un bouton jaime
    $("#div").on("click",".jaime", function(){
        var jaime=$(this);
        var id_art=$(this).attr('art_id');
//on apelle en ajax notre fichier de traitement serveur en lui donnant en parramètre idetifiant de notre article
        $.ajax({
            type: "GET",
            url: "/articles/jaime?id_art="+id_art,
            dataType : "html",
//affichage de l'erreur en cas de problème
            error:function(msg, string){
                alert( "Error !: " + string );
            },
            success:function(data){
//si le fichier renvoi 0 on ne fait rien sinon on vide notre lien et on remplace par les nouvelles données
                if(data!=0)
                {
                     jaime.empty();
                     jaime.append(data);
                }
            }
            });
    });
});
