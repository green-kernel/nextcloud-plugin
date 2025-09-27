# Sustainability Monitor (Nextcloud app)

This app shows realtime energy readings from `/proc/energy/cgroup` provided by the ProcPower kernel extension.

## Install

1. Copy this folder to your Nextcloud `apps/` directory as `sustainability/`.
2. Ensure the web server user can read `/proc/energy/cgroup` (often world-readable; otherwise use group perms or an ACL). **No setuid needed.**
3. Enable the app:

   ```bash
   sudo -u www-data php occ app:enable sustainability
   ```

4. As an admin, open Nextcloud and click **Sustainability** in the left sidebar.

## Security & permissions

- The navigation page and `/apps/sustainability/energy` endpoint are **admin-only**. Non-admins get HTTP 403/blank.
- Chart.js is bundled; no external CDN required (CSP-safe).
- CSRF: requests include the `requesttoken` header automatically via `OC.requestToken`.

## Configuration

- File path is fixed to `/proc/energy/cgroup` for now. To make it configurable, add an admin settings form and persist a path in the app config via `\OCP\IConfig` with validation (absolute path, max length, no `..`).
- Poll interval defaults to 1000 ms in `js/main.js`.
- Keep last 300 points (~5 minutes).


## Troubleshooting

- If the chart shows "File not readable", confirm ProcPower is installed and the webserver (e.g., `www-data`) can read the file.
- Use `tail -f /proc/energy/cgroup` on the host to verify it updates.
- Check Nextcloud logs: `data/nextcloud.log`.

