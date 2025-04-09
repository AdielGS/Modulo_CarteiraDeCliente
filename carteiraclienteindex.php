<?php

require '../../main.inc.php';
require_once DOL_DOCUMENT_ROOT.'/core/lib/admin.lib.php';
require_once DOL_DOCUMENT_ROOT.'/custom/carteiradecliente/class/cliente.class.php';
require_once DOL_DOCUMENT_ROOT.'/custom/carteiradecliente/class/interacao.class.php';

$langs->load("carteiradecliente@carteiradecliente");

// Segurança do acesso
//if (!$user->admin && empty($user->rights->carteiradecliente->read)) {
//    accessforbidden();
//}

// Cabeçalho do Dolibarr
llxHeader('', $langs->trans("CarteiraDeCliente"));

// Cards visuais com contadores
print '<div class="container">';

print '<div class="div-table-responsive-no-min">';
print '<table class="noborder centpercent">';

print '<tr class="liste_titre">';
print '<th colspan="2">' . $langs->trans("Resumo Carteira de Cliente") . '</th>';
print '</tr>';

// Conta clientes
$sql1 = "SELECT COUNT(*) as nb FROM ".MAIN_DB_PREFIX."cliente";
$resql1 = $db->query($sql1);
if ($resql1) {
    $obj1 = $db->fetch_object($resql1);
    print '<tr><td>Total de Clientes</td><td>'.$obj1->nb.'</td></tr>';
}

// Conta interações
$sql2 = "SELECT COUNT(*) as nb FROM ".MAIN_DB_PREFIX."interacao";
$resql2 = $db->query($sql2);
if ($resql2) {
    $obj2 = $db->fetch_object($resql2);
    print '<tr><td>Total de Interações</td><td>'.$obj2->nb.'</td></tr>';
}

print '</table>';
print '</div>';

// Atalhos visuais
print '<div style="margin-top: 20px;">';
print '<h3>Atalhos rápidos</h3>';

print '<a class="button" href="cliente_list.php?idmenu=54&mainmenu=carteiradecliente&leftmenu=">📋 Lista de Clientes</a> ';
print '<a class="button" href="cliente_card.php?action=create&idmenu=55&mainmenu=carteiradecliente&leftmenu=">➕ Novo Cliente</a> ';
print '<a class="button" href="interacao_list.php?idmenu=57&mainmenu=carteiradecliente&leftmenu=">💬 Lista de Interações</a> ';
print '<a class="button" href="interacao_card.php?action=create&idmenu=58&mainmenu=carteiradecliente&leftmenu=">➕ Nova Interação</a> ';

print '</div>';

print '</div>';

// Rodapé do Dolibarr
llxFooter();
$db->close();
