<?php

interface Command
{
    public function start(Output $output): int;
}