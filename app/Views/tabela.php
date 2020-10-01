<h1>Contatos</h1>
<h3>Tabela de Contatos</h3>
<?php echo anchor('contatos/novo','Novo Contato'); ?>
<table>
<tr>
    <th><?php echo($cabecalho[0])?></th>
    <th><?php echo($cabecalho[1])?></th>
    <th><?php echo($cabecalho[2])?></th>
</tr>
<?php foreach ($contatos as $cont): ?>
<tr>
    <td><?php echo $cont["nome"]; ?></td>
    <td><?php echo $cont["telefone"]; ?></td>
    <td><?php echo $cont["email"]; ?></td>
</tr>
<?php endforeach; ?> 
</table>