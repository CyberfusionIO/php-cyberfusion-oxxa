<?php

namespace Cyberfusion\Oxxa\Enum;

class StatusCode
{
    public const STATUS_DOMAIN_REGISTERED = 'XMLOK 1';

    public const STATUS_DOMAIN_AUTORENEW_CHANGED = 'XMLOK 2';

    public const STATUS_DOMAIN_LOCK_CHANGED = 'XMLOK 3';

    public const STATUS_DOMAIN_TOKEN_SENT = 'XMLOK 39';

    public const STATUS_DOMAIN_UPDATED = 'XMLOK 12';

    public const STATUS_NSGROUP_ADDED = 'XMLOK 4';

    public const STATUS_NSGROUP_UPDATED = 'XMLOK 6';

    public const STATUS_NSGROUP_DELETED = 'XMLOK 5';

    public const STATUS_NSGROUP_RETRIEVED = 'XMLOK 25';

    public const STATUS_NSGROUPS_RETRIEVED = 'XMLOK 24';

    public const STATUS_IDENTITY_ADDED = 'XMLOK 7';

    public const STATUS_IDENTITY_UPDATED = 'XMLOK 8';

    public const STATUS_IDENTITY_DELETED = 'XMLOK 9';

    public const STATUS_IDENTITIES_RETRIEVED = 'XMLOK 22';

    public const STATUS_IDENTITY_RETRIEVED = 'XMLOK 23';

    public const STATUS_DOMAIN_TAKEN = 'XMLOK 10';

    public const STATUS_DOMAIN_AVAILABLE = 'XMLOK 11';

    public const STATUS_DOMAIN_RETRIEVED = 'XMLOK 16';

    public const STATUS_DOMAINS_RETRIEVED = 'XMLOK18';

    public const STATUS_DOMAIN_TRANSFERRED = 'XMLOK 17';

    public const STATUS_TASK_LIST_RETRIEVED = 'XMLOK 22';

    public const STATUS_TASK_RETRIEVED = 'XMLOK 48';

    public const STATUS_DOMAIN_TRANSFERRED_ALTERNATIVE = 'XMLOK 76';

    public const STATUS_GLUES_UPDATED = 'XMLOK 142';

    public const STATUS_TLDS_RETRIEVED = 'XMLOK 46';

    public const STATUS_DNSSEC_RETRIEVED = 'XMLOK 80';

    public const STATUS_DNSSEC_ADDED = 'XMLOK 82';

    public const STATUS_DNSSEC_DELETED = 'XMLOK 81';

    public const STATUS_SSL_RETRIEVED = 'XMLOK 115';

    public const STATUS_SSL_PRODUCTS_RETRIEVED = 'XMLOK 118';

    public const STATUS_DOMAIN_REGISTER_REQUESTED = 'XMLPEN 1';

    public const STATUS_DOMAIN_TRANSFER_REQUESTED = 'XMLPEN 3';

    public const STATUS_DOMAIN_TRANSFER_PENDING = 'XMLPEN 4';

    public const STATUS_DOMAIN_DELETED = 'XMLPEN 11';

    public const STATUS_DOMAIN_RESTORED = 'XMLPEN 12';

    public const STATUS_INVALID_CREDENTIALS = 'XMLERR 1';

    public const STATUS_INVALID_ADMIN_IDENTITY = 'XMLERR 11';

    public const STATUS_INVALID_TECH_IDENTITY = 'XMLERR 12';

    public const STATUS_INVALID_BILLING_IDENTITY = 'XMLERR 13';

    public const STATUS_INVALID_REGISTRANT_IDENTITY = 'XMLERR 14';

    public const STATUS_INVALID_NAME_SERVER_GROUP = 'XMLERR 15';

    public const STATUS_DOMAIN_NOT_MUTATABLE = 'XMLERR 19';

    public const STATUS_DOMAIN_EPP_NOT_AVAILABLE_DOMAIN_LOCKED = 'XMLERR 390';

    public const STATUS_DOMAIN_NOT_IN_ADMINISTRATION = 'XMLERR 24';

    public const STATUS_DOMAIN_TRANSFER_INVALID_EPP = 'XMLERR 64';

    public const STATUS_DOMAIN_TRANSFER_UNABLE_LOCK = 'XMLERR 66';

    public const STATUS_DOMAIN_TRANSFER_DOMAIN_ALREADY_PRESENT = 'XMLERR 160';

    public const STATUS_DOMAIN_TRANSFER_DOMAIN_IN_QUARANTINE = 'XMLERR 537';

    public const STATUS_DOMAIN_TRANSFER_NOT_EXISTS = 'XMLERR243';

    public const STATUS_DOMAIN_UNKNOWN = 'XMLERR 20';

    public const STATUS_INSUFFICIENT_FUNDS = 'XMLERR 87';

    public const STATUS_HELPDESK_NEEDED = 'XMLERR 184';

    public const STATUS_EPP_REQUESTED_TOO_MANY_TIMES = 'XMLERR 263';
}
