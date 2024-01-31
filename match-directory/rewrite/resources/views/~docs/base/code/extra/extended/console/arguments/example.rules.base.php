<?php
#[\Override]
protected function rules(): array
{
    return [
        Arg(name: 'Name')->short(name: 'N')->default('Undefined')->required(),
        Arg(name: 'force'),
        Arg(name: 'UserData')->list()->default([]),
    ];
}