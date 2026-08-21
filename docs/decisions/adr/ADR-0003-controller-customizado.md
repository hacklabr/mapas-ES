# ADR-0003 — Implementar relatórios administrativos via controller customizado no plugin

**Status:** aceito  
**Data:** 2026-08-21  
**Round:** Setup

## Contexto

A demanda de auditoria (LICC) exigia uma visão consolidada de revisões e arquivos por inscrição. O módulo de relatórios do core não oferecia essa visualização específica.

## Decisão

Criar o controller `essettings` e as views correspondentes no plugin `SettingsES`, em vez de estender o módulo de relatórios do core.

## Consequências

- Entrega rápida de funcionalidades específicas.
- Acoplamento a nomes de tabelas e colunas internas do core (`entity_revision`, `file`).
- SQL manual sem ORM aumenta a fragilidade em upgrades futuros do core.
