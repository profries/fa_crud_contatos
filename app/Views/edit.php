<?php echo anchor('contatos/listar','Voltar'); ?>
<h1>Contatos</h1>
<h3>Edição de Contatos</h3>
<?= \Config\Services::validation()->listErrors(); ?>
<h4><?= $mensagem ?></h4>
<form method="post">
<?= csrf_field() ?>

<input type="hidden" name="id" value="<?=$contato['id'];?>">

<label for="nome">Nome</label>
<input type="input" name="nome" value="<?=$contato['nome'];?>"/><br />

<label for="text">Telefone</label>
<input type="input" name="telefone" value="<?=$contato['telefone'];?>"><br />

<label for="text">Email</label>
<input type="input" name="email" value="<?=$contato['email'];?>">
<br />

<input type="submit" name="submit" value="Salvar" />
</form>