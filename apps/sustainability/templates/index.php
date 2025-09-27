<?php
script('sustainability', 'chart.min');
script('sustainability', 'main');
style('sustainability', 'style'); // optional if you add css
?>
<div id="sustainability-app" class="section">
  <h2><?php p($l->t('Sustainability')); ?></h2>
  <p><?php p($l->t('This page reads /proc/energy/cgroup once per second and graphs per-PID energy values. Install ProcPower on the host.')); ?></p>
  <div id="status" style="margin:8px 0; font-weight:600;">Status: <span id="status-text">Initializing…</span></div>
  <div style="display:flex; gap:24px; align-items:flex-start; flex-wrap:wrap;">
    <div style="flex:1 1 700px; min-width:360px;">
      <canvas id="sustainability-chart" height="260"></canvas>
    </div>
    <div style="flex:1 1 420px; min-width:320px;">
      <div class="panel">
        <h3 style="margin-top:0;">Latest readings (per PID)</h3>
        <div><strong>Timestamp:</strong> <span id="ts">—</span></div>
        <div style="margin-top:8px; overflow:auto; max-height:360px;">
          <table class="grid">
            <thead>
              <tr>
                <th>PID</th>
                <th>comm</th>
                <th style="text-align:right;">energy (kWh)</th>
              </tr>
            </thead>
            <tbody id="table-body">
              <tr><td colspan="3">—</td></tr>
            </tbody>
          </table>
        </div>
        <details style="margin-top:12px;">
          <summary>Raw file</summary>
          <pre id="raw" style="background:#f6f7f7;padding:8px;border-radius:4px;overflow:auto;max-height:180px;">—</pre>
        </details>
      </div>
    </div>
  </div>
</div>

