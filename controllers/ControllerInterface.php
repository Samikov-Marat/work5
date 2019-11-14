<?php

namespace controllers;

interface ControllerInterface
{
    public function execute(array $semanticParameters);
}