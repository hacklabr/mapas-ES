# ADR-0001 — Manter dois temas durante a transição

**Status:** aceito  
**Data:** 2026-08-21  
**Round:** Setup

## Contexto

O repositório contém o tema antigo `EspiritoSanto` (BaseV1) e o novo `MapaCulturalES` (BaseV2). A configuração ativa em produção aponta para `MapaCulturalES`, mas o tema BaseV1 ainda carrega textos, logotipos e db-updates de revisão.

## Decisão

Manter o tema BaseV1 (`EspiritoSanto`) no repositório enquanto o BaseV2 (`MapaCulturalES`) é o tema de produção.

## Consequências

- Risco de manutenção duplicada (imagens, textos, assets).
- Possível confusão sobre qual tema deve ser editado.
- Facilita rollback, mas aumenta dívida técnica até que o legado seja removido.
