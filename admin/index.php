<?php
require_once __DIR__ . '/auth_check.php';
require_once __DIR__ . '/../includes/db.php';

$leads = [];

// Fetch leads directly from MySQL database `ebola`
$db = get_db_connection();
if ($db) {
    try {
        $stmt = $db->query("SELECT lead_uid AS id, fullname, phone, created_at AS timestamp FROM leads ORDER BY id DESC");
        $db_leads = $stmt->fetchAll();
        if (is_array($db_leads) && !empty($db_leads)) {
            $leads = $db_leads;
        }
    } catch (Exception $e) {
        error_log("DB Read error: " . $e->getMessage());
    }
}

// Fallback to JSON if DB returned no records
if (empty($leads)) {
    $file = __DIR__ . '/../data/leads.json';
    $json_leads = file_exists($file) ? json_decode(file_get_contents($file), true) : [];
    if (is_array($json_leads)) {
        $leads = array_reverse($json_leads);
    }
}

$leads_reversed = $leads;
$total_count = count($leads);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Espace Administration — TUJIKINGE NA EBOLA</title>
  <link rel="icon" type="image/png" href="../logo2.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

  <!-- Admin Header Nav -->
  <header class="site-header" style="background: var(--bg-card); border-bottom: 1px solid var(--border-color);">
    <div class="container">
      <nav class="navbar" style="height: 70px;">
        <a href="../index.php" class="navbar-brand">
          <img src="../logo.png" alt="TUJIKINGE NA EBOLA Logo" class="brand-logo" style="height: 44px;">
          <div class="brand-text-wrapper">
            <span class="brand-title">TUJIKINGE NA EBOLA</span>
            <span class="brand-subtitle text-danger"><i class="bi bi-shield-lock-fill me-1"></i> Espace Administration</span>
          </div>
        </a>

        <div class="d-flex align-items-center gap-3">
          <a href="../index.php" class="btn btn-outline btn-sm" target="_blank">
            <i class="bi bi-globe me-1"></i> Voir le site
          </a>
          <a href="logout.php" class="btn btn-danger btn-sm">
            <i class="bi bi-box-arrow-right me-1"></i> Déconnexion
          </a>
        </div>
      </nav>
    </div>
  </header>

  <section style="padding: 3rem 0; background: var(--bg-accent); min-height: calc(100vh - 70px);">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
        <div>
          <h1 class="h2 font-weight-bold mb-1"><i class="bi bi-shield-lock-fill text-teal me-2"></i> Lecteurs Enregistrés</h1>
          <p class="text-muted mb-0">Suivi et comptage des personnes ayant accédé à la campagne de sensibilisation.</p>
        </div>

        <div class="d-flex gap-2">
          <?php if (!empty($leads_reversed)): ?>
            <button onclick="clearAllLeads()" class="btn btn-outline btn-lg text-danger" style="border-color: #fca5a5;">
              <i class="bi bi-trash3-fill me-1"></i> Tout Effacer
            </button>
          <?php endif; ?>
          <a href="../api/export_leads.php" class="btn btn-primary btn-lg">
            <i class="bi bi-file-earmark-excel-fill me-2"></i> Télécharger en Excel (.xls)
          </a>
        </div>
      </div>

      <!-- Stats Card Bar -->
      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 1.5rem; margin-bottom: 2rem;">
        <div style="background: var(--bg-card); padding: 1.75rem; border-radius: var(--radius-md); border: 1px solid var(--border-color); box-shadow: var(--shadow-sm); display: flex; align-items: center; gap: 1.25rem;">
          <div style="width: 56px; height: 56px; border-radius: var(--radius-md); background: var(--primary-light); color: var(--primary-dark); display: flex; align-items: center; justify-content: center; font-size: 1.6rem;">
            <i class="bi bi-people-fill"></i>
          </div>
          <div>
            <h3 class="display-6 font-weight-bold mb-0 text-teal"><?php echo $total_count; ?></h3>
            <p class="text-muted small mb-0 font-weight-bold">Nombre Total de Lecteurs Enregistrés</p>
          </div>
        </div>

        <div style="background: var(--bg-card); padding: 1.75rem; border-radius: var(--radius-md); border: 1px solid var(--border-color); box-shadow: var(--shadow-sm); display: flex; align-items: center; gap: 1.25rem;">
          <div style="width: 56px; height: 56px; border-radius: var(--radius-md); background: #dcfce7; color: #15803d; display: flex; align-items: center; justify-content: center; font-size: 1.6rem;">
            <i class="bi bi-check-circle-fill"></i>
          </div>
          <div>
            <h3 class="h4 font-weight-bold mb-0 text-success">Statut Actif</h3>
            <p class="text-muted small mb-0">Formulaire d'accès fonctionnel</p>
          </div>
        </div>
      </div>

      <!-- Table of Leads -->
      <div style="background: var(--bg-card); border-radius: var(--radius-lg); border: 1px solid var(--border-color); box-shadow: var(--shadow-md); overflow: hidden;">
        <div style="padding: 1.25rem 1.5rem; border-bottom: 1px solid var(--border-color); display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem;">
          <h3 class="h5 font-weight-bold mb-0">Liste des Lecteurs Enregistrés (<?php echo $total_count; ?>)</h3>
          <input type="text" id="adminSearchInput" class="form-control" placeholder="Rechercher par nom ou téléphone..." style="max-width: 300px;">
        </div>

        <?php if (empty($leads_reversed)): ?>
          <div class="text-center p-5">
            <i class="bi bi-inbox text-muted display-4 mb-3"></i>
            <h4>Aucun lecteur enregistré pour le moment.</h4>
            <p class="text-muted">Les noms et numéros des lecteurs apparaîtront ici automatiquement dès qu'ils rempliront le popup.</p>
          </div>
        <?php else: ?>
          <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; text-align: left;" id="adminLeadsTable">
              <thead>
                <tr style="background: var(--bg-accent); border-bottom: 1px solid var(--border-color); font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px; color: var(--text-muted);">
                  <th style="padding: 1rem 1.5rem;">#</th>
                  <th style="padding: 1rem 1.5rem;">Nom Complet</th>
                  <th style="padding: 1rem 1.5rem;">Numéro de Téléphone</th>
                  <th style="padding: 1rem 1.5rem;">Date & Heure</th>
                  <th style="padding: 1rem 1.5rem; text-align: right;">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($leads_reversed as $idx => $lead): ?>
                  <tr style="border-bottom: 1px solid var(--border-color); font-size: 0.95rem;" id="row-<?php echo htmlspecialchars($lead['id']); ?>">
                    <td style="padding: 1rem 1.5rem; font-weight: 700; color: var(--text-muted);"><?php echo $total_count - $idx; ?></td>
                    <td style="padding: 1rem 1.5rem; font-weight: 700; color: var(--text-main);"><?php echo htmlspecialchars($lead['fullname'] ?? 'Inconnu'); ?></td>
                    <td style="padding: 1rem 1.5rem;">
                      <a href="tel:<?php echo htmlspecialchars($lead['phone'] ?? ''); ?>" class="text-teal font-weight-bold">
                        <i class="bi bi-telephone-fill me-1"></i> <?php echo htmlspecialchars($lead['phone'] ?? ''); ?>
                      </a>
                    </td>
                    <td style="padding: 1rem 1.5rem; color: var(--text-muted);"><?php echo htmlspecialchars($lead['timestamp'] ?? ''); ?></td>
                    <td style="padding: 1rem 1.5rem; text-align: right;">
                      <button onclick="deleteSingleLead('<?php echo htmlspecialchars($lead['id']); ?>')" class="btn btn-outline btn-sm text-danger" style="border-color: #fee2e2; padding: 0.35rem 0.75rem;" title="Supprimer ce lecteur">
                        <i class="bi bi-trash-fill"></i> Supprimer
                      </button>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <script>
  document.getElementById('adminSearchInput')?.addEventListener('input', function(e) {
    const query = e.target.value.toLowerCase().trim();
    const rows = document.querySelectorAll('#adminLeadsTable tbody tr');
    rows.forEach(row => {
      const text = row.textContent.toLowerCase();
      row.style.display = text.includes(query) ? '' : 'none';
    });
  });

  async function deleteSingleLead(id) {
    if (!confirm("Êtes-vous sûr de vouloir supprimer ce lecteur de la base de données ?")) {
      return;
    }

    const formData = new FormData();
    formData.append('action', 'delete_single');
    formData.append('id', id);

    try {
      const res = await fetch('../api/delete_lead.php', {
        method: 'POST',
        body: formData
      });
      const data = await res.json();
      if (data.status === 'success') {
        window.location.reload();
      } else {
        alert(data.message || "Erreur lors de la suppression.");
      }
    } catch (err) {
      console.error(err);
      alert("Erreur de connexion lors de la suppression.");
    }
  }

  async function clearAllLeads() {
    if (!confirm("ATTENTION : Êtes-vous sûr de vouloir TOUT EFFACER ?\nToutes les données de lecteurs enregistrés seront définitivement supprimées.")) {
      return;
    }

    const formData = new FormData();
    formData.append('action', 'clear_all');

    try {
      const res = await fetch('../api/delete_lead.php', {
        method: 'POST',
        body: formData
      });
      const data = await res.json();
      if (data.status === 'success') {
        window.location.reload();
      } else {
        alert(data.message || "Erreur lors de la suppression des données.");
      }
    } catch (err) {
      console.error(err);
      alert("Erreur de connexion lors de la suppression.");
    }
  }
  </script>

</body>
</html>
