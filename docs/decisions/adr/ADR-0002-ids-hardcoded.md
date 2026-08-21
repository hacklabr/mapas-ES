# ADR-0002 — Codificar IDs de entidades diretamente no código PHP

**Status:** aceito  
**Data:** 2026-08-21  
**Round:** Setup

## Contexto

Foram necessárias exceções pontuais para oportunidades, inscrições e avaliadores sem uma interface administrativa genérica. As regras afetam a oportunidade `265`, a inscrição `13048`, os avaliadores `1787793248`, `2060560646`, `1246987641`, `164822607`, e as oportunidades de revisão `159`, `156`, `239`, `479`.

## Decisão

Hardcodar os IDs diretamente no plugin `SettingsES` e no `db-updates.php` do tema `EspiritoSanto`.

## Consequências

- Qualquer alteração exige novo deploy.
- Alto risco de regressão se os IDs forem reutilizados ou migrados.
- A documentação dos motivos de cada ID torna-se indispensável.
