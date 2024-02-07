<?php

namespace todolist;

if (!session_id()) session_start();

require_once('../app/init.php');
new Router($_GET);
