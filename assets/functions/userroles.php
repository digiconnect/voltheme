<?php
// User Roles (e.g., organization, volunteer)
$result = add_role( 'organization', __(
'Organization' ),
array(
'read' => true, // true allows this capability
)
);

$result = add_role( 'volunteer', __(
'Volunteer' ),
array(
'read' => true, // true allows this capability
)
);
?>