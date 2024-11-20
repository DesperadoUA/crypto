<?php
global $builder;
echo is_tax() ? $builder->canonical() : '';