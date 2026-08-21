---
name: exemplo-skill
description: Use esta skill como referência de formato ao criar uma nova skill para este projeto. Não executa nada por si só.
---

# Exemplo de skill

## Pré-requisitos

- O nome da skill deve ser descritivo e o campo `description` deve dizer EXPLICITAMENTE quando usá-la.
- O procedimento deve ter passos numerados, objetivos e verificáveis.
- A checklist de pronto deve incluir testes, typecheck e documentação.

## Procedimento

1. Verifique que o padrão/procedimento é repetível, multi-etapa ou de alto custo de erro.
2. Verifique que um agente NÃO acertaria sozinho (se acerta, não precisa de skill).
3. Crie o arquivo `.agents/skills/<nome-da-skill>/SKILL.md` a partir deste template.
4. Registre a nova skill na seção de ponteiros do `AGENTS.md`.

## Critérios de pronto

- [ ] Testes passando (`<!-- TODO: preencher comando de teste -->`)
- [ ] Tipos checados (`<!-- TODO: preencher comando de typecheck -->`)
- [ ] Documentação atualizada se o contrato mudou
