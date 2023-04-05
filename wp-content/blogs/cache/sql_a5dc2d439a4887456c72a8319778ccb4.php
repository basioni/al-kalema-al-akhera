<?php exit; ?>
1403547796
SELECT m.*, u.user_colour, g.group_colour, g.group_type FROM (phpbbaze_moderator_cache m) LEFT JOIN phpbbaze_users u ON (m.user_id = u.user_id) LEFT JOIN phpbbaze_groups g ON (m.group_id = g.group_id) WHERE m.display_on_index = 1
6
a:0:{}