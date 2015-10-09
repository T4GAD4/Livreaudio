<div class="row" id="login">
    <div class="col-md-4 col-md-offset-4" style="margin-top:15%; padding:0 80px;">
        <form id="connexion">
            <h2 style="color:#FFF;text-align:center;">Livre Audio</h2>
            <div style="padding:15px;">
                <input type="email" class="form-control" placeholder="Username" name="mail" required="" value="test@test.fr" />
            </div>
            <div style="padding:15px;">
                <input type="password" class="form-control" placeholder="Password" name="mdp" required="" value="test" />
            </div>
            <div style="text-align:center;">
                <input type="submit" class="btn btn-default submit" value="Connexion"/>
            </div>
            <div class="clearfix"></div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#connexion').on('submit', function (e) {
            console.log('test');
            e.preventDefault();
            $data = {};
            $data.mail = $('[name=mail]').val();
            $data.mdp = $('[name=mdp]').val();
            $.ajax({
                url: "utilisateur",
                method: "POST",
                data: $data
            }).done(function () {
                testConnexion();
            });
        });
    });
</script>