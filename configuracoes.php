<?php
require_once "config.php";
require_once 'models/Auth.php';
require_once 'dao/userDaoMysql.php';

$auth = new Auth($pdo, $base);
$userInfo = $auth->checkToken();
$activeMenu = 'settings';

$userDao = new UserDaoMysql($pdo);

require 'partials/header.php';
require 'partials/menu.php';
?>

<section class="feed mt-10">

    <h1>Configurações</h1>

    <?php if (!empty($_SESSION['flash'])) : ?>
        <?= $_SESSION['flash']; ?>
        <?php $_SESSION['flash'] = ''; ?>
    <?php endif; ?>

    <form action="configuracoes_action.php" class='config-form' method="post" enctype="multipart/form-data">
        <label for="avatar">
            Novo Avatar: <br>
            <input type="file" name="avatar"> <br>
            <img class="mini" src="<?= $base; ?>/media/avatars/<?= $userInfo->avatar; ?>" alt="Foto de Perfil">
        </label>
        <label for="cover">
            Nova Capa: <br>
            <input type="file" name="cover"> <br>
            <img class="mini" src="<?= $base; ?>/media/covers/<?= $userInfo->cover; ?>" alt="Foto de Perfil">
        </label>

        <hr>

        <label for="name">
            Nome Completo: <br>
            <input type="text" name="name" value="<?= $userInfo->name; ?>">
        </label>
        <label for="email">
            Email: <br>
            <input type="text" name="email" value="<?= $userInfo->email; ?>">
        </label>
        <label for="birthday">
            Data de Nascimento: <br>
            <input type="text" name="birthday" id="birthday" value="<?= date('d/m/Y', strtotime($userInfo->birthday)); ?>">
        </label>
        <label for="city">
            Cidade: <br>
            <input type="text" name="city" value="<?= $userInfo->city; ?>">
        </label>
        <label for="work">
            Trabalho: <br>
            <input type="text" name="work" value="<?= $userInfo->work; ?>">
        </label>

        <hr>

        <label for="password">
            Nova Senha: <br>
            <input type="password" name="password">
        </label>

        <label for="name">
            Confirmar Senha: <br>
            <input type="password" name="password_confirmation">
        </label>

        <button class='button'>Salvar</button>
    </form>

</section>
<script src="https://unpkg.com/imask"></script>
<script>
    IMask(
        document.getElementById('birthday'), {
            mask: '00/00/0000'
        }
    );
</script>

<?php require 'partials/footer.php'; ?>