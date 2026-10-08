<?php
// Export leads data as an Excel (.xls) Spreadsheet file

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (empty($_SESSION['admin_logged_in'])) {
    header('Location: ../admin/login.php');
    exit;
}

require_once __DIR__ . '/../includes/db.php';

$leads = [];

// Fetch leads directly from MySQL database `ebola`
$db = get_db_connection();
if ($db) {
    try {
        $stmt = $db->query("SELECT lead_uid AS id, fullname, phone, created_at AS timestamp FROM leads ORDER BY id ASC");
        $db_leads = $stmt->fetchAll();
        if (is_array($db_leads) && !empty($db_leads)) {
            $leads = $db_leads;
        }
    } catch (Exception $e) {
        error_log("DB Export error: " . $e->getMessage());
    }
}

// Fallback to JSON if DB returned no records
if (empty($leads)) {
    $file = __DIR__ . '/../data/leads.json';
    $leads = file_exists($file) ? json_decode(file_get_contents($file), true) : [];
    if (!is_array($leads)) $leads = [];
}

$filename = "Tujikinge_Ebola_Lecteurs_" . date('Y-m-d_H-i') . ".xls";

header('Content-Type: application/vnd.ms-excel; charset=utf-8');
header('Content-Disposition: attachment; filename="' . $filename . '"');
header('Cache-Control: max-age=0, no-cache, must-revalidate');

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<?mso-application progid="Excel.Sheet"?>' . "\n";
?>
<Workbook xmlns="urn:schemas-microsoft-com:office:spreadsheet"
 xmlns:o="urn:schemas-microsoft-com:office:office"
 xmlns:x="urn:schemas-microsoft-com:office:excel"
 xmlns:ss="urn:schemas-microsoft-com:office:spreadsheet"
 xmlns:html="http://www.w3.org/TR/REC-html40">
 <DocumentProperties xmlns="urn:schemas-microsoft-com:office:office">
  <Title>Rapport des Lecteurs - Tujikinge Ebola</Title>
  <Author>Tujikinge Ebola Admin</Author>
  <Created><?php echo date('Y-m-d\TH:i:s\Z'); ?></Created>
 </DocumentProperties>
 <Styles>
  <Style ss:ID="Default" ss:Name="Normal">
   <Alignment ss:Vertical="Bottom"/>
   <Borders/>
   <Font ss:FontName="Calibri" ss:Size="11" ss:Color="#000000"/>
   <Interior/>
   <NumberFormat/>
   <Protection/>
  </Style>
  <Style ss:ID="HeaderStyle">
   <Font ss:FontName="Calibri" ss:Size="11" ss:Bold="1" ss:Color="#FFFFFF"/>
   <Interior ss:Color="#0D9488" ss:Pattern="Solid"/>
   <Alignment ss:Horizontal="Center" ss:Vertical="Center"/>
   <Borders>
    <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#0F766E"/>
    <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#0F766E"/>
    <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#0F766E"/>
    <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#0F766E"/>
   </Borders>
  </Style>
  <Style ss:ID="DataStyle">
   <Font ss:FontName="Calibri" ss:Size="11" ss:Color="#1E293B"/>
   <Alignment ss:Vertical="Center"/>
   <Borders>
    <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#E2E8F0"/>
    <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#E2E8F0"/>
    <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#E2E8F0"/>
    <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#E2E8F0"/>
   </Borders>
  </Style>
  <Style ss:ID="CenterStyle">
   <Font ss:FontName="Calibri" ss:Size="11" ss:Color="#1E293B"/>
   <Alignment ss:Horizontal="Center" ss:Vertical="Center"/>
   <Borders>
    <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#E2E8F0"/>
    <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#E2E8F0"/>
    <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#E2E8F0"/>
    <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#E2E8F0"/>
   </Borders>
  </Style>
 </Styles>
 <Worksheet ss:Name="Lecteurs Enregistrés">
  <Table>
   <Column ss:Width="60"/>
   <Column ss:Width="220"/>
   <Column ss:Width="160"/>
   <Column ss:Width="180"/>
   <Row ss:Height="26">
    <Cell ss:StyleID="HeaderStyle"><Data ss:Type="String">ID</Data></Cell>
    <Cell ss:StyleID="HeaderStyle"><Data ss:Type="String">Nom Complet</Data></Cell>
    <Cell ss:StyleID="HeaderStyle"><Data ss:Type="String">Numéro de Téléphone</Data></Cell>
    <Cell ss:StyleID="HeaderStyle"><Data ss:Type="String">Date d'enregistrement</Data></Cell>
   </Row>
<?php foreach ($leads as $index => $lead): 
    $id = htmlspecialchars((string)($lead['id'] ?? ($index + 1)), ENT_XML1 | ENT_QUOTES, 'UTF-8');
    $fullname = htmlspecialchars((string)($lead['fullname'] ?? ''), ENT_XML1 | ENT_QUOTES, 'UTF-8');
    $phone = htmlspecialchars((string)($lead['phone'] ?? ''), ENT_XML1 | ENT_QUOTES, 'UTF-8');
    $timestamp = htmlspecialchars((string)($lead['timestamp'] ?? ''), ENT_XML1 | ENT_QUOTES, 'UTF-8');
?>
   <Row ss:Height="22">
    <Cell ss:StyleID="CenterStyle"><Data ss:Type="String"><?php echo $id; ?></Data></Cell>
    <Cell ss:StyleID="DataStyle"><Data ss:Type="String"><?php echo $fullname; ?></Data></Cell>
    <Cell ss:StyleID="DataStyle"><Data ss:Type="String"><?php echo $phone; ?></Data></Cell>
    <Cell ss:StyleID="CenterStyle"><Data ss:Type="String"><?php echo $timestamp; ?></Data></Cell>
   </Row>
<?php endforeach; ?>
  </Table>
 </Worksheet>
</Workbook>
<?php
exit;
?>
