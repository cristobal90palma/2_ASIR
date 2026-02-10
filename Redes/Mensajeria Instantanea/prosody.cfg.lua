admins = { "admin@im07.institutodh.net" }
plugin_paths = { "/usr/local/lib/prosody/modules" }
modules_enabled = {
                "roster"; -- Allow users to have a roster. Recommended ;)
                "saslauth"; -- Authentication for clients and servers. Recommended if you want to log in.
                "tls"; -- Add support for secure TLS on c2s/s2s connections
                "dialback"; -- s2s dialback support
                "disco"; -- Service discovery

                "carbons"; -- Keep multiple clients in sync
                "pep"; -- Enables users to publish their avatar, mood, activity, playing music and more
                "private"; -- Private XML storage (for room bookmarks, etc.)
                "blocklist"; -- Allow users to block communications with other users
                "vcard4"; -- User profiles (stored in PEP)
                "vcard_legacy"; -- Conversion between legacy vCard and PEP Avatar, vcard
                "limits"; -- Enable bandwidth limiting for XMPP connections

                "version"; -- Replies to server version requests
                "uptime"; -- Report how long server has been running
                "time"; -- Let others know the time here on this server
                "ping"; -- Replies to XMPP pings with pongs
                "register"; -- Allow users to register on this server using a client and change passwords
        -- Admin interfaces
                "admin_adhoc"; -- Allows administration via an XMPP client that supports ad-hoc commands

        -- Other specific functionality
                "posix"; -- POSIX functionality, sends server to background, enables syslog, etc.
}

modules_disabled = {
}

allow_registration = false -- Cámbialo a 'true' solo cuando necesites crear cuentas. El módulo "register" debe estár habilitado.

daemonize = true; -- Si lo dejas en "false", cuando cierres la terminal SSH, el servidor de Prosody se detendrá.
pidfile = "/run/prosody/prosody.pid";
c2s_require_encryption = true -- SEGURIDAD: Obliga a usar cifrado entre cliente y servidor
s2s_require_encryption = true -- SEGURIDAD: Obliga a usar cifrado entre servidores

s2s_secure_auth = true
allow_unencrypted_plain_auth = false

-- Límite velocidad conexión
limits = {
  c2s = {
    rate = "50kb/s";
  };
  s2sin = {
    rate = "100kb/s";
  };
}
authentication = "internal_hashed"
archive_expires_after = "2w" -- Remove archived messages after 1 week
log = {
        -- Log files (change 'info' to 'debug' for debug logs):
        debug = "/var/log/prosody/prosody.log";
        error = "/var/log/prosody/prosody.err";
        -- Syslog:
        { levels = { "error" }; to = "syslog";  };
}
certificates = "certs"
VirtualHost "im07.institutodh.net"
	ssl = {
        key = "/etc/prosody/certs/im07.institutodh.net.key";
        certificate = "/etc/prosody/certs/im07.institutodh.net.crt";
    }
Component "conference.im07.institutodh.net" "muc"
modules_enabled = { "muc_mam" }

Include "conf.d/*.cfg.lua"
