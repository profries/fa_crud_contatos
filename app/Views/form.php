<?php echo anchor('contatos/listar','Voltar'); ?>
<h1>Contatos</h1>
<h3>Formulário de Contatos</h3>
<?= \Config\Services::validation()->listErrors(); ?>
<?= isset($mensagem) ?$mensagem :'' ?>
<form method="post">
<?= csrf_field() ?>
<label for="nome">Nome</label>
<input type="input" name="nome" /><br />

<label for="text">Telefone</label>
<input type="input" name="telefone"><br />

<label for="text">Email</label>
<input type="input" name="email">
<br />

<input type="submit" name="submit" value="Salvar" />
</form>