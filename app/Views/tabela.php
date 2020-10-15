<?= $mensagem ?>
<h1>Contatos</h1>
<h3>Tabela de Contatos</h3>
<?php echo anchor('contatos/inserir','Novo Contato'); ?>
<table>
<tr>
    <th><?php echo($cabecalho[0])?></th>
    <th><?php echo($cabecalho[1])?></th>
    <th><?php echo($cabecalho[2])?></th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
</tr>
<?php foreach ($contatos as $cont): ?>
<tr>
    <td><?php echo $cont["nome"]; ?></td>
    <td><?php echo $cont["telefone"]; ?></td>
    <td><?php echo $cont["email"]; ?></td>
    <td><?php echo anchor('contatos/editar/'.$cont["id"],'Editar'); ?></td>
    <td><?php echo anchor('contatos/excluir/'.$cont["id"],'Excluir'); ?></td>

</tr>
<?php endforeach; ?> 
</table>