<?php

apc_clear_cache('opcode');
apc_clear_cache('user');
apc_clear_cache();

echo 'Cache Cleared';