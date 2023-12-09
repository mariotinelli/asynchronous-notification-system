<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Sistema de Notificações Assíncronas

# 1. Introdução:

## 1.1 Objetivo:
O objetivo principal deste projeto é criar uma plataforma web utilizando Laravel que permita aos usuários receber notificações exclusivas sobre eventos de seu interesse. Além disso, será implementado um sistema de assinatura premium, onde os usuários terão acesso a recursos avançados e benefícios exclusivos mediante pagamento.

## 1.2 Tecnologias:
- Laravel 10
- PHP 8.2
- MySQL
- Tailwind CSS
- Alpine.js
- Filament
- Livewire
- Redis
- Pest PHP
- GitHub Actions
- Laravel Sail
- Laravel Telescope
- Laravel Horizon
- Laravel Cashier (Stripe)
- Laravel Pint
- Laravel Socialite
- Laravel Passport

# 2. Autenticação e Autorização:

## 2.1 Registro e Login:
- Página de registro com validações.
- Página de login com recuperação de senha.
- Login com redes sociais.
- Sistema de autenticação Laravel.

## 2.2 Tipos de Usuários:
- Administrador, organizador e participante.

## 2.3 Permissões:
- Permissões para cada tipo de usuário.

# 3. Telas do Sistema:

## 3.1 Acesso Administrador:

Para as permissões e funções será utlizado o laravel permission do spatie:
https://spatie.be/docs/laravel-permission/v6/introduction

### 3.1.1 Dashboard:

#### 3.1.1.1 Gráficos

##### 3.1.1.1.1 Número Total de Participantes:

- **Descrição:** Exibe o total de participantes registrados no sistema.
- **Tipo de Gráfico:** Indicador Numérico
- **Eixo X:** -
- **Eixo Y:** Número Total de participantes

##### 3.1.1.1.2 Número Total de Organizadores:

- **Descrição:** Exibe o total de organizadores registrados no sistema.
- **Tipo de Gráfico:** Indicador Numérico
- **Eixo X:** -
- **Eixo Y:** Número Total de participantes

##### 3.1.1.1.3 Número Total de Eventos:

- **Descrição:** Exibe o total de eventos registrados no sistema.
- **Tipo de Gráfico:** Indicador Numérico
- **Eixo X:** -
- **Eixo Y:** Número Total de eventos

##### 3.1.1.1.4 Atividade de Registro por Dia:

- **Descrição:** Mostra a quantidade de novos registros de usuários por dia, fornecendo insights sobre picos de atividade.
- **Tipo de Gráfico:** Gráfico de Linha (Stats do Filament)
- **Eixo X:** Tempo (dias)
- **Eixo Y:** Número de Registros

##### 3.1.1.1.5 Atividade de Login por Horário:

- **Descrição:** Indica os horários de pico de atividade de login no sistema.
- **Tipo de Gráfico:** Gráfico de Barras (por hora do dia)
- **Eixo X:** Horas do Dia
- **Eixo Y:** Número de Atividades de Login

### 3.1.2 Gestão de Funções (Roles):

#### 3.1.2.1 Página de Visualização:
- Apenas administradores acessar a página de visualização de funções.
  - Header:
    - Título: Funções.
    - Botão de criação: Criar Função.
  - Tabela:
    - Colunas: nome, data de criação, data de atualização.
    - Ordenações: nome, data de criação, data de atualização.
    - Filtro geral: nome, data de criação, data de atualização.
    - Filtro por coluna: nenhum.
    - Filtro adicional: nenhum.
    - Ações: editar, excluir (Modal com confirmação).
    - Paginação: 10, 25, 50, 100.

#### 3.1.2.2 Modal de Criação e Edição:
- Apenas administradores podem criar e editar funções.
- Campos:
  - Nome: TextInput (Filament).
  - Descrição: RichEditor (Filament).
  - Permissões: Select (Filament).
    - Suffix Action:
      - Icon: heroicon-o-plus.
      - Ação: Abrir modal de criação de permissão.
- Validações:
  - Nome: required, string, unique, max:255.
  - Descrição: nullable, string, max:500.
  - Permissões: required, min:1.
- Ao criar ou editar uma função:
  - Adicionar na tabela de histórico a ação realizada.

#### 3.1.2.3 Modal de Exclusão:
- Apenas administradores podem excluir funções.
- Mensagem: Tem certeza que deseja excluir a função: {nome}?
- Ao excluir uma função: 
  - Excluir também os relacionamentos.
  - Adicionar na tabela de histórico a ação realizada.

### 3.1.3 Gestão de Permissões:

#### 3.1.3.1 Página de Visualização:
- Apenas administradores acessar a página de visualização de permissões.
- Header:
  - Título: Permissões.
  - Botão de criação: Criar Permissão.
- Tabela:
  - Colunas: nome, data de criação, data de atualização.
  - Ordenações: nome, data de criação, data de atualização.
  - Filtro geral: nome, data de criação, data de atualização.
  - Filtro por coluna: nenhum.
  - Filtro adicional: nenhum.
  - Ações: editar, excluir (Modal com confirmação).
  - Paginação: 10, 25, 50, 100.

#### 3.1.3.2 Modal de Criação e Edição:
- Apenas administradores podem criar e editar permissões.
- Campos:
  - Nome: TextInput (Filament).
  - Descrição: RichEditor (Filament).
  - Funções: Select (Filament).
    - Suffix Action:
      - Icon: heroicon-o-plus.
      - Ação: Abrir modal de criação de função.
- Validações:
  - Nome: required, unique, max:255.
  - Descrição: nullable, max:500.
  - Funções: required, min:1.
- Ao criar ou editar uma permissão:
  - Adicionar na tabela de histórico a ação realizada.

#### 3.1.3.3 Modal de Exclusão:
- Apenas administradores podem excluir permissões.
- Mensagem: Tem certeza que deseja excluir a permissão: {nome}?
- Ao excluir uma permissão: 
  - Excluir também os relacionamentos.
  - Adicionar na tabela de histórico a ação realizada.

### 3.1.4 Gestão de Participantes:

#### 3.1.4.1 Banco de Dados:
- Nome da tabela: participants
- Campos:
  - id: bigint, auto increment, primary key.
  - user_id: bigint, not null, foreign key.
  - birthday: date, not null.
  - age: int, not null.
  - whatsapp: varchar(15), nullable, unique.
  - premium: boolean, not null, default: false.
  - created_at: timestamp, not null.
  - updated_at: timestamp, not null.

#### 3.1.4.2 Página de Visualização:
- Apenas administradores podem visualizar os participantes cadastrados no sistema.
- Header:
  - Título: Participantes.
  - Botão de criação: Criar Participante.
- Tabela:
  - Colunas: Nome(name), E-mail(email), Idade(age), Whatsapp(whatsapp), Premium(premium), Data de criação(created_at), Data de atualização(updated_at).
  - Ordenações: name, email, age, whatsapp, premium, created_at e updated_at.
  - Filtro geral: name, email, age, whatsapp, premium, created_at e updated_at.
  - Filtro por coluna: nenhum.
  - Filtro adicional: Premium - Select (Participante Comum, Participante Premium)
  - Ações: editar, excluir (Modal com confirmação).
  - Paginação: 10, 25, 50, 100.

#### 3.1.4.2 Modal de Criação e Edição:
- Apenas administradores podem criar e editar participantes.
- Campos:
  - Nome: TextInput (Filament).
  - Email: TextInput (Filament).
  - Whatsapp: TextInput (Filament) - Mask: (99) 99999-9999.
  - Premium: Toggle (Filament).
- Validações:
  - Nome: required, string, max:255.
  - Email: required, unique, email, max:255.
  - Data de Nascimento: required, date, before:today.
  - Whatsapp: nullable, unique, string, max:15.
  - Premium: required, boolean.
- A senha deve ser gerada automaticamente.
- Salvar os campos name, email e password na tabela users.
- Salvar os campos whatsapp e premium na tabela participants.
- Após o cadastro enviar um email de boas vindas com a senha e link de acesso.
- Ao criar ou editar um participante:
  - Adicionar na tabela de histórico a ação realizada.

#### 3.1.4.3 Modal de Exclusão:
- Apenas administradores podem excluir participantes.
- Mensagem: Tem certeza que deseja excluir o participante: {nome}?
- Ao excluir um participante: 
  - Excluir também todas as inscrições e notificações relacionadas.
  - Enviar um email avisando que sua conta foi excluída do sistema e que não irá mais receber as notificações.
  - Adicionar na tabela de histórico a ação realizada.

### 3.1.5 Gestão de Organizadores:

#### 3.1.5.1 Banco de Dados:
- Nome da tabela: organizers
- Campos:
    - id: bigint, auto increment, primary key.
    - user_id: bigint, not null, foreign key.
    - cnpj: varchar(18), not null, unique.
    - company_name: varchar(255), not null.
    - whatsapp: varchar(15), nullable, unique.
    - created_at: timestamp, not null.
    - updated_at: timestamp, not null.

#### 3.1.5.2 Página de Visualização:
- Apenas administradores podem visualizar os organizadores cadastrados no sistema.
- Header:
    - Título: Organizadores.
    - Botão de criação: Criar Organizador.
- Tabela:
    - Colunas: Nome(name), E-mail(email), CNPJ(cnpj), Razão Social(company_name), Whatsapp(whatsapp), Data de criação(created_at), Data de atualização(updated_at).
    - Ordenações: name, email, cnpj, company_name, whatsapp, created_at e updated_at.
    - Filtro geral: name, email, cnpj, company_name, whatsapp, created_at e updated_at.
    - Filtro por coluna: nenhum.
    - Filtro adicional: nenhum.
    - Ações: editar, excluir (Modal com confirmação).
    - Paginação: 10, 25, 50, 100.

#### 3.1.5.3 Modal de Criação e Edição:
- Apenas administradores podem criar e editar organizadores.
- Campos:
    - Nome: TextInput (Filament).
    - Email: TextInput (Filament).
    - CNPJ: TextInput (Filament) - Mask: 99.999.999/9999-99.
    - Razão Social: TextInput (Filament).
    - Whatsapp: TextInput (Filament) - Mask: (99) 99999-9999.
- Validações:
    - Nome: required, string, max:255.
    - Email: required, unique, email, max:255.
    - CNPJ: required, unique, string, max:14.
    - Razão Social: required, string, max:255.
    - Whatsapp: nullable, unique, string, max:15.
- A senha deve ser gerada automaticamente.
- Salvar os campos name, email e password na tabela users.
- Salvar os campos cnpj, company_name e whatsapp na tabela organizers.
- Após o cadastro enviar um email de boas vindas com a senha e link de acesso.
- Ao criar ou editar um organizador:
    - Adicionar na tabela de histórico a ação realizada.

#### 3.1.5.4 Modal de Exclusão:
- Apenas administradores podem excluir organizadores.
- Mensagem: Tem certeza que deseja excluir o organizador: {nome}?
- Ao excluir um organizador: 
    - Excluir também todos os eventos criados por ele.
    - Enviar um email avisando que sua conta foi excluída do sistema juntamente com seus eventos, também deve contem o motivo da exclusão da conta.
    - Adicionar na tabela de histórico a ação realizada.

### 3.1.6 Gestão de Categoria de Eventos:

#### 3.1.6.1 Banco de Dados:
- Nome da tabela: event_categories
- Campos:
  - id: bigint, auto increment, primary key.
  - name: varchar(255), not null.
  - created_at: timestamp, not null.
  - updated_at: timestamp, not null.

#### 3.1.6.2 Página de Visualização:
- Apenas administradores podem acessar a página de visualização de eventos.
- Header:
  - Título: Categorias de Eventos.
  - Botão de criação: Criar Categoria de Evento.
- Tabela:
  - Colunas: Nome(name), Data de criação(created_at), Data de atualização(updated_at).
  - Ordenações: name, created_at e updated_at.
  - Filtro geral: name, created_at e updated_at.
  - Filtro por coluna: nenhum.
  - Filtro adicional: nenhum.
  - Ações: editar, excluir (Modal com confirmação).
  - Paginação: 10, 25, 50, 100.

#### 3.1.6.3 Modal de Criação e Edição:
- Apenas administradores  podem criar e editar categorias de eventos.
- Campos:
  - Nome: TextInput (Filament).
- Validações:
  - Nome: required, string, max:255.
- Ao criar ou editar uma categoria de evento:
  - Adicionar na tabela de histórico a ação realizada.

#### 3.1.6.4 Modal de Exclusão:
- Apenas administradores  podem excluir categorias de eventos.
- Mensagem: Tem certeza que deseja excluir a categoria de evento: {nome}?
- Verificar se existem eventos relacionados.
  - Se existir, exibir uma mensagem de erro.
  - Se não existir, excluir a categoria de evento.
- Ao excluir uma categoria de evento:
  - Adicionar na tabela de histórico a ação realizada.

### 3.1.7 Gestão de Eventos:

#### 3.1.7.1 Banco de Dados:

- Nome da tabela: states
- Campos:
  - id: bigint, auto increment, primary key.
  - name: varchar(255), not null.
  - created_at: timestamp, not null.
  - updated_at: timestamp, not null.
  
- Nome da tabela: cities
- Campos:
  - id: bigint, auto increment, primary key.
  - name: varchar(255), not null.
  - state_id: bigint, not null, foreign key, table: states.
  - created_at: timestamp, not null.
  - updated_at: timestamp, not null.
  
- Nome da tabela: addresses
- Campos:
  - id: bigint, auto increment, primary key.
  - street: varchar(255), not null.
  - number: varchar(10), not null.
  - complement: varchar(255), nullable.
  - city_id: bigint, not null, foreign key, table: cities.
  - zip_code: varchar(8), not null.
  - created_at: timestamp, not null.
  - updated_at: timestamp, not null.
  
- Nome da tabela: events
- Campos:
  - id: bigint, auto increment, primary key.
  - owner_id: bigint, not null, foreign key, table: organizers.
  - title: varchar(255), not null.
  - description: text, not null.
  - date: date, not null.
  - time: time, not null.
  - status: enum('Publicado', 'Em andamento', 'Finalizado', 'Cancelado'), not null, default: 'Publicado'.
  - max_participants: int, not null.
  - qty_participants: int, not null, default: 0.
  - views: int, not null, default: 0.
  - address_id: bigint, not null, foreign key, table: addresses.
  - category_id: bigint, not null, foreign key, table: event_categories.
  - created_at: timestamp, not null.
  - updated_at: timestamp, not null.
  
- Nome da tabela: event_participant
- Campos:
    - id: bigint, auto increment, primary key.
    - event_id: bigint, not null, foreign key, table: events.
    - participant_id: bigint, not null, foreign key, table: participants.
    - feedback: enum('1', '2', '3', '4', '5'), nullable.
    - subscribed_at: timestamp, not null.
    - created_at: timestamp, not null.
    - updated_at: timestamp, not null.

#### 3.1.7.2 Página de Visualização:
- Apenas administradores podem acessar essa página de visualização de eventos.
- Header:
  - Título: Eventos.
  - Botão de criação: Criar Evento.
- Tabela:
  - Colunas: Título(title), Data(date), Horário(time), Categoria(category_id), Status(status), Máx Participantes(max_participants), Qnt Participantes(qty_participantes), Visualizações(views), Data de criação(created_at), Data de atualização(updated_at).
  - Ordenações: title, date, time, status, max_participants, qty_participants, views, category_id, created_at e updated_at.
  - Filtro geral: title, date, time, status, max_participants, qty_participants, views, category_id, created_at e updated_at.
  - Filtro por coluna: nenhum.
  - Filtro adicional: Categoria - Select (Todas as categorias), Status - Select(Todos os Status).
  - Ações: Participantes, Editar, Cancelar (Modal com confirmação), Excluir (Modal com confirmação).
  - Paginação: 10, 25, 50, 100.

#### 3.1.7.3 Modal de Criação e Edição:
- Apenas administradores podem criar e editar eventos por essa página de visualização.
- Campos:
  - Título: TextInput (Filament).
  - Descrição: RichEditor (Filament).
  - Data: DatePicker (Filament).
  - Horário: TimePicker (Filament).
  - Máximo de Participantes: TextInput (Filament).
  - Categoria: Select (Filament).
    - Suffix Action:
        - Esta ação aparece apenas administrador.
        - Icon: heroicon-o-plus.
        - Ação: Abrir modal de criação de categoria.
  - Endereço:
    - CEP: TextInput (Filament) - Mask: 99999-999.
    - Rua: TextInput (Filament).
    - Número: TextInput (Filament).
    - Complemento: TextInput (Filament).
    - Cidade: TextInput (Filament) - Disabled - Será preenchido através do CEP.
    - Estado: TextInput (Filament) - Disabled - Será preenchido através do CEP.

#### 3.1.7.4 Modal de Cancelamento:
- Apenas administradores podem cancelar eventos por essa página de visualização.
- Mensagem: Tem certeza que deseja cancelar o evento: {nome}?
- Campo de motivo: TextInput (Filament).
- Ao cancelar um evento:
    - Excluir também todas as inscrições e notificações relacionadas.
    - Notificar o organizador do evento que o mesmo foi cancelado e qual o motivo do cancelamento.
    - Notificar os participantes inscritos no evento que o mesmo foi excluído.
    - Um evento cancelado não pode ser editado.
    - Adicionar na tabela de histórico a ação realizada.

#### 3.1.7.5 Modal de Exclusão:
- Apenas administradores podem excluir eventos por essa página de visualização.
- Mensagem: Tem certeza que deseja excluir o evento: {nome}?
- Campo de motivo: TextInput (Filament).
- Ao excluir um evento:
  - Excluir também todas as inscrições e notificações relacionadas.
  - Notificar o organizador do evento que o mesmo foi excluído e qual o motivo da exclusão.
  - Notificar os participantes inscritos no evento que o mesmo foi excluído.
  - Excluir do banco de dados.
  - Adicionar na tabela de histórico a ação realizada.

#### 3.1.7.6 Lista de Participantes:
- Apenas administradores podem acessar a lista de participantes.
- Header:
    - Título: Participantes do Evento - [Nome do Evento].
    - Botão para adicionar participante: Adicionar Participante.
    - Botão para editar evento: Editar Evento.
    - Botão para cancelar evento: Cancelar Evento.
    - Botão para excluir evento: Excluir Evento.
- Tabela de Participantes:
    - Colunas: Nome(participants.user.name), E-mail(participants.user.email), Data de Inscrição(subscribed_at).
    - Ordenações: name, email, subscribed_at.
    - Filtro geral: name, email, subscribed_at.
    - Filtro por coluna: nenhum.
    - Filtro adicional: nenhum.
    - Ações: Remover(Modal com confirmação).
    - Paginação: 10, 25, 50, 100.

##### 3.1.7.6.1 Adição Manual de Participante:
- Apenas administradores podem adicionar manualmente participantes.
- Apenas eventos com status 'Publicado' podem receber novos participantes.
- Campos:
    - participant_id: Select (Filament).
- Ao adicionar manualmente um participante:
    - Enviar notificação de confirmação de inscrição.
    - Adicionar na tabela de histórico a ação realizada.

##### 3.1.7.6.2 Remoção Manual de Participante:
- Apenas administradores podem remover participantes.
- Apenas eventos com status 'Publicado' podem remover participantes.
- Mensagem: Tem certeza que deseja remover o participante {nome}?
- Aviso: Remover um participante não afeta suas notificações.
- Ao remover um participante:
    - Notificar o participante removido.
    - Remover notificações relacionadas.
    - Adicionar na tabela de histórico a ação realizada.

### 3.1.8 Gestão de Inscrições:

#### 3.1.8.1 Banco de Dados:
- Nome da tabela: event_subscriptions
- Campos:
  - id: bigint, auto increment, primary key.
  - user_id: bigint, not null, foreign key, table: users.
  - event_id: bigint, not null, foreign key, table: events.
  - subscription_at: timestamp, not null.
  - updated_at: timestamp, not null.

#### 3.1.8.2 Página de Visualização:
- Apenas administradores  podem acessar essa página de visualização de inscrições.
- Header:
  - Título: Inscrições.
  - Botão de criação: Criar Inscrição.
- Tabela:
  - Colunas: Participante(user_id), Evento(event_id), Data da inscrição(subscription_at), Data de atualização(updated_at).
  - Ordenações: user_id, event_id, created_at e updated_at.
  - Filtro geral: user_id, event_id, created_at e updated_at.
  - Filtro por coluna: nenhum.
  - Filtro adicional: nenhum.
  - Ações: editar, excluir (Modal com confirmação).
  - Paginação: 10, 25, 50, 100.

#### 3.1.8.3 Modal de Criação e Edição:
- Apenas administradores podem criar e editar inscrições por essa página de visualização.
- Campos:
  - Participante: Select (Filament).
    - Suffix Action:
      - Icon: heroicon-o-plus.
      - Ação: Abrir modal de criação de participante.
  - Evento: Select (Filament).
    - Suffix Action:
      - Icon: heroicon-o-plus.
      - Ação: Abrir modal de criação de evento.
- Validações:
  - Participante: required, exists.
  - Evento: required, exists.
- Ao criar ou editar uma inscrição:
  - Adicionar na tabela de histórico a ação realizada.

#### 3.1.8.4 Modal de Exclusão:
- Apenas administradores podem excluir inscrições por essa página de visualização.
- Mensagem: Tem certeza que deseja excluir a inscrição: {nome}?
- Ao excluir uma inscrição:
  - Adicionar na tabela de histórico a ação realizada.

### 3.1.9 Gestão de Tipo de Notificações:

#### 3.1.9.1 Banco de Dados:
- Nome da tabela: type_notifications
- Campos:
  - id: bigint, auto increment, primary key.
  - name: varchar(255), not null.
  - is_premium: boolean, not null, default: false.
  - created_at: timestamp, not null.
  - updated_at: timestamp, not null.
- Seeder:
  - Criar 3 tipos de notificações: Sistema (is_premium: false), Email (is_premium: true) e Whatsapp (is_premium: true).

#### 3.1.9.2 Página de Visualização:
- Apenas administradores podem acessar essa página de visualização de tipos de notificações.
- Header:
  - Título: Tipos de Notificações.
  - Botão de criação: Criar Tipo de Notificação.
- Tabela:
  - Colunas: Nome(name), Premium(is_premium), Data de criação(created_at), Data de atualização(updated_at).
  - Ordenações: name, is_premium, created_at e updated_at.
  - Filtro geral: name, is_premium, created_at e updated_at.
  - Filtro por coluna: nenhum.
  - Filtro adicional: Premium - Select (Todos, Sim, Não).
  - Ações: editar, excluir (Modal com confirmação).
  - Paginação: 10, 25, 50, 100.

#### 3.1.9.3 Modal de Criação e Edição:
- Apenas administradores podem criar e editar tipos de notificações por essa página de visualização.
- Campos:
  - Nome: TextInput (Filament).
  - Premium: Toggle (Filament).
- Validações:
  - Nome: required, string, max:255.
  - Premium: required, boolean.
- Ao criar ou editar um tipo de notificação:
  - Adicionar na tabela de histórico a ação realizada.

#### 3.1.9.4 Modal de Exclusão:
- Apenas administradores podem excluir tipos de notificações por essa página de visualização.
- Mensagem: Tem certeza que deseja excluir o tipo de notificação: {nome}?
- Verificar se existem notificações relacionadas.
  - Se existir, exibir uma mensagem de erro.
  - Se não existir, excluir o tipo de notificação.
- Ao excluir um tipo de notificação:
  - Excluir também todas as notificações relacionadas.
  - Adicionar na tabela de histórico a ação realizada.

### 3.1.10 Gestão de Notificações:

#### 3.1.10.1 Banco de Dados:

- Nome da tabela: event_notifications
- Campos:
  - id: bigint, auto increment, primary key.
  - type_event_notification_id: bigint, not null, foreign key, table: type_event_notifications.
  - participant_id: bigint, not null, foreign key, table: participants.
  - event_id: bigint, not null, foreign key, table: events.
  - created_at: timestamp, not null.
  - updated_at: timestamp, not null.

- Nome da tabela: trigger_event_notifications
- Campos:
    - id: bigint, auto increment, primary key.
    - event_notification_id: bigint, not null, foreign key, table: event_notifications.
    - trigger_name: varchar(255), not null.
    - trigger_at: timestamp, not null.
    - created_at: timestamp, not null.
    - updated_at: timestamp, not null.

#### 3.1.10.2 Página de Visualização:
- Apenas administradores podem acessar essa página de visualização de notificações.
- Header:
  - Título: Notificações.
  - Botão de criação: Criar Notificação.
- Tabela:
  - Colunas: Participante(participant_id), Evento(event_id), Tempo(1 dia antes, 12 horas antes, 1 hora antes e Ao iniciar), Tipo(type_event_notification_id), Data de criação(created_at), Data de atualização(updated_at).
  - Ordenações: participant_id, event_id, type_event_notification_id, created_at e updated_at.
  - Filtro geral: participant_id, event_id, type_event_notification_id, created_at e updated_at.
  - Filtro por coluna: nenhum.
  - Filtro adicional: Tipo - Select (Participante, Evento, Tempo(trigger_name) e Tipo).
  - Ações: editar, excluir (Modal com confirmação).
  - Paginação: 10, 25, 50, 100.

#### 3.1.10.3 Modal de Criação e Edição:
- Apenas administradores podem criar e editar notificações por essa página de visualização.
- Campos:
  - Participante: Select (Filament).
    - Suffix Action:
      - Icon: heroicon-o-plus.
      - Ação: Abrir modal de criação de participante.
  - Evento: Select (Filament).
    - Suffix Action:
      - Icon: heroicon-o-plus.
      - Ação: Abrir modal de criação de evento.
  - Tempo: Select (Filament) - Multiple.
    - Opções:
      - 1 dia antes.
      - 12 horas antes.
      - 1 hora antes.
      - Ao iniciar.
  - Tipo: Select (Filament).
    - Suffix Action:
      - Icon: heroicon-o-plus.
      - Ação: Abrir modal de criação de tipo.
- Validações:
  - Participante: required, exists.
  - Evento: required, exists.
  - Tempo: required, exists.
  - Tipo: required, exists.
- Os campos event_id, participant_id e type_event_notification_id devem ser salvos na tabela event_notifications.
- O campo trigger_at deve ser calculado de acordo com o tempo selecionado e a data e hora do evento selecionado.
- Os campos event_notification_id, trigger_name e trigger_at devem ser salvos na tabela trigger_event_notifications
- Ao criar ou editar uma notificação:
  - Adicionar na tabela de histórico a ação realizada.
- Ao editar um evento:
  - Verificar se a data e hora do evento foi alterada.
    - Se foi alterado, atualizar o campo trigger_at na tabela trigger_event_notifications.

#### 3.1.10.4 Modal de Exclusão:
- Apenas administradores podem excluir notificações por essa página de visualização.
- Mensagem: Tem certeza que deseja excluir a notificação: {nome}?
- Ao excluir uma notificação:
  - Adicionar na tabela de histórico a ação realizada.
  - Excluir os relacionamentos.
  - Enviar uma notificação na central para o participante informando que a notificação foi excluída.

### 3.1.11 Histórico de Ações do Sistema:

#### 3.1.11.1 Banco de Dados:

- Nome da tabela: system_actions
- Campos:
  - id: bigint, auto increment, primary key.
  - user_id: bigint, not null, foreign key, table: users.
  - action: varchar(255), not null.
  - created_at: timestamp, not null.
  - updated_at: timestamp, not null.

#### 3.1.11.2 Página de Visualização:
- Apenas administradores podem acessar essa página de visualização de histórico de ações.
- Header:
  - Título: Histórico de Ações.
- Tabela:
  - Colunas: Usuário(user_id), Ação(action), Data de criação(created_at), Data de atualização(updated_at).
  - Ordenações: user_id, action, created_at e updated_at.
  - Filtro geral: user_id, action, created_at e updated_at.
  - Filtro por coluna: nenhum.
  - Filtro adicional: nenhum.
  - Ações: nenhum.
  - Paginação: 10, 25, 50, 100.

### 3.1.12 Configurações:

#### 3.1.12.1 Página de Visualização:
- Apenas administradores podem acessar essa página de visualização de configurações.
- Header:
  - Título: Configurações.
- Sections:
  - Seção 1:
    - Título: Perfil.
    - Campos: Nome(name), E-mail(email).
  - Seção 2:
    - Título: Segurança.
    - Campo: Senha antiga(password), Nova senha(new_password), Confirmação nova senha(confirm_new_password).

## 3.2 Acesso Organizador

### 3.2.1 Dashboard

#### 3.2.1.1 Gráficos

##### 3.2.1.1.1 Número de Participantes por Evento:

- **Descrição:** Este gráfico exibe a quantidade de participantes em cada evento, permitindo uma rápida comparação entre eles.
- **Tipo de Gráfico:** Gráfico de Barras
- **Eixo X:** Eventos
- **Eixo Y:** Número de Participantes

##### 3.2.1.1.2 Crescimento de Participantes ao Longo do Tempo:

- **Descrição:** Representa o crescimento cumulativo do número total de participantes ao longo do tempo, revelando tendências gerais.
- **Tipo de Gráfico:** Gráfico de Linha (Stats do Filament)
- **Eixo X:** Tempo (dias, semanas ou meses)
- **Eixo Y:** Número Total de Participantes

##### 3.2.1.1.3 Distribuição Etária dos Participantes:

- **Descrição:** Mostra a distribuição de participantes em diferentes faixas etárias, auxiliando na personalização de eventos.
- **Tipo de Gráfico:** Gráfico de Barras Empilhadas
- **Eixo X:** Faixas Etárias
- **Eixo Y:** Número de Participantes

##### 3.2.1.1.5 Feedback dos Participantes:

- **Descrição:** Apresenta a média de feedback dos participantes por evento, identificando áreas de melhoria ou sucesso.
- **Tipo de Gráfico:** Gráfico de Barras
- **Eixo X:** Eventos
- **Eixo Y:** Média de Feedback (pode ser uma escala de 1 a 5)

##### 3.2.1.1.7 Ranking de Eventos Mais Populares:

- **Descrição:** Classifica os eventos com base na popularidade, destacando os mais bem-sucedidos em termos de participação.
- **Tipo de Gráfico:** Gráfico de Barras
- **Eixo X:** Eventos (ordenados por popularidade)
- **Eixo Y:** Número de Participantes

### 3.2.2 Gestão de Eventos:

#### 3.2.2.1 Página de Visualização:
- Apenas organizadores podem acessar essa página de visualização de eventos.
- Header:
    - Título: Eventos.
    - Botão de criação: Criar Evento.
- Tabela:
    - Colunas: Título(title), Data(date), Horário(time), Categoria(category_id), Status(status), Máx Participantes(max_participants), Qnt Participantes(qty_participantes), Visualizações(views), Data de criação(created_at), Data de atualização(updated_at).
    - Ordenações: title, date, time, status, max_participants, qty_participants, views, category_id, created_at e updated_at.
    - Filtro geral: title, date, time, status, max_participants, qty_participants, views, category_id, created_at e updated_at.
    - Filtro por coluna: nenhum.
    - Filtro adicional: Categoria - Select (Todas as categorias), Status - Select(Todos os Status).
    - Ações: Participantes, Editar, Cancelar (Modal com confirmação).
    - Paginação: 10, 25, 50, 100.

#### 3.2.2.2 Modal de Criação e Edição:
- Apenas administradores podem criar e editar eventos por essa página de visualização.
- Campos:
    - Título: TextInput (Filament).
    - Descrição: RichEditor (Filament).
    - Data: DatePicker (Filament).
    - Horário: TimePicker (Filament).
    - Máximo de Participantes: TextInput (Filament).
    - Categoria: Select (Filament).
        - Suffix Action:
            - Esta ação aparece apenas administrador.
            - Icon: heroicon-o-plus.
            - Ação: Abrir modal de criação de categoria.
    - Endereço:
        - CEP: TextInput (Filament) - Mask: 99999-999.
        - Rua: TextInput (Filament).
        - Número: TextInput (Filament).
        - Complemento: TextInput (Filament).
        - Cidade: TextInput (Filament) - Disabled - Será preenchido através do CEP.
        - Estado: TextInput (Filament) - Disabled - Será preenchido através do CEP.

#### 3.2.2.3 Modal de Cancelamento:
- Apenas administradores podem cancelar eventos por essa página de visualização.
- Mensagem: Tem certeza que deseja cancelar o evento: {nome}?
- Aviso: Um evento cancelado não pode ser editado.
- Campo de motivo: TextInput (Filament).
- Ao cancelar um evento:
    - Excluir também todas as inscrições e notificações relacionadas.
    - Notificar os participantes inscritos no evento que o mesmo foi excluído.
    - Um evento cancelado não pode ser editado.
    - Adicionar na tabela de histórico a ação realizada.

#### 3.2.2.4 Lista de Participantes:
- Apenas organizadores podem acessar a lista de participantes.
- Header:
    - Título: Participantes do Evento - [Nome do Evento].
    - Botão para adicionar participante: Adicionar Participante.
    - Botão para editar evento: Editar Evento.
    - Botão para cancelar evento: Cancelar Evento.
- Tabela de Participantes:
    - Colunas: Nome(participants.user.name), E-mail(participants.user.email), Data de Inscrição(subscribed_at).
    - Ordenações: name, email, subscribed_at.
    - Filtro geral: name, email, subscribed_at.
    - Filtro por coluna: nenhum.
    - Filtro adicional: nenhum.
    - Ações: Remover(Modal com confirmação).
    - Paginação: 10, 25, 50, 100.

##### 3.2.2.4.1 Adição Manual de Participante:
- Apenas organizadores podem adicionar manualmente participantes.
- Apenas eventos com status 'Publicado' podem receber novos participantes.
- Campos:
    - participant_id: Select (Filament).
- Ao adicionar manualmente um participante:
    - Enviar notificação de confirmação de inscrição.
    - Adicionar na tabela de histórico a ação realizada.

##### 3.2.2.4.2 Remoção Manual de Participante:
- Apenas organizadores podem remover participantes.
- Apenas eventos com status 'Publicado' podem remover participantes.
- Mensagem: Tem certeza que deseja remover o participante {nome}?
- Aviso: Remover um participante não afeta suas notificações.
- Ao remover um participante:
    - Notificar o participante removido.
    - Remover notificações relacionadas.
    - Adicionar na tabela de histórico a ação realizada.

### 3.1.2 Configurações:

#### 3.1.2.1 Página de Visualização:
- Apenas organizadores podem acessar essa página de visualização de configurações.
- Header:
    - Título: Configurações.
- Sections:
    - Seção 1:
        - Título: Perfil.
        - Campos: Nome(name), E-mail(email), Razão Social(company_name), Cnpj(cnpj), Whatsapp(whatsapp).
    - Seção 2:
        - Título: Segurança.
        - Campo: Senha antiga(password), Nova senha(new_password), Confirmação nova senha(confirm_new_password).

### 4.2 Processamento Assíncrono:
- Implementação de Jobs e filas para notificações assíncronas.
- Monitoramento usando Laravel Telescope.

### 4.3 Preferências de Notificação:
- Configuração para usuários escolherem tipos de notificação.

## 3.3 Acesso Geral

Layout:
    - Header:
        - Logo.
        - Menus:
            - Eventos.
            - Torne-se um organizador (Apenas para participantes).
            - Premium (Apenas para participantes).
            - Sobre.
            - Contato.
        - Central de Notificações:
            - Icon: heroicon-o-bell.
        - Dropdown:
            - Icon: heroicon-o-user-circle.
            - Nome do usuário (Se logado).
            - Login (Se não logado).
            - Logout (Se logado).
            - Cadastro (Se não logado).
            - Favoritos (Se logado).
            - Participações (Se logado).
            - Configurações (Se logado).

### 3.3.1 Eventos (Página Inicial):

- Carrossel dos eventos mais vistos (máximo 10).
- Grid com todos os eventos não finalizados ou cancelados com paginação de 10, 25, 50, 100.
  - Card Evento:
    - Imagem do evento.
    - Título do evento.
    - Data do evento.
    - Horário do evento.
    - Descrição do evento.
    - Botão de inscrição ou cancelamento de inscrição.
    - Botão de favoritar.
    - Botão de Ver Mais (Envia para a página do evento).
    - Botão de Notificação (Apenas para eventos que o participante está inscrito).
        - Icon: heroicon-o-bell-alert.
        - Ação: Abrir dropdown com checkbox para selecionar os tipos de notificações que o participante deseja receber.
        - Notificações:
            - Sistema (Geral)
            - Email (Premium) - Trazer bloqueado para usuários que não são premium com icon de cadeado.
            - Whatsapp (Premium) - Trazer bloqueado para usuários que não são premium com icon de cadeado.

### 3.3.2 Torne-se um organizador:

#### 3.3.2.1 Página de Assinatura

- Formulário Wizard:
   - Informações da Empresa (Step 1): 
      - Campos:
        - Email: TextInput (Filament).
          - Suffix Action:
            - Icon: heroicon-o-arrow-path.
            - Tooltip: Utilizar o mesmo email.
            - Ação: Preencher email com o email do usuário logado.
          - CNPJ: TextInput (Filament) - Mask: 99.999.999/9999-99.
          - Razão Social: TextInput (Filament).
          - Whatsapp: TextInput (Filament) 
            - Mask: (99) 99999-9999.
            - Icon: heroicon-o-arrow-path.
            - Tooltip: Utilizar o mesmo whatsapp.
            - Ação: Preencher whatsapp com o whatsapp do usuário logado.
      - Validações:
        - Email: required, unique, email, max:255.
        - CNPJ: required, unique, string, max:14.
        - Razão Social: required, string, max:255.
        - Whatsapp: nullable, unique, string, max:15.
   - Informações de Assinatura (Step 2):
     - Campos:
         - Plano: Select (Filament).
             - Opções:
                 - Mensal.
                 - Anual.
         - Forma de Pagamento: Select (Filament).
             - Opções:
                 - Cartão de Crédito.
                 - Cartão de Débito.
         - Termos de Uso: Checkbox (Filament).
     - Validações:
         - Plano: required, string, max:255.
         - Forma de Pagamento: required, string, max:255.
         - Termos de Uso: required, boolean.
   - Informações de Pagamento (Step 3):
      - Campos:
        - Número do Cartão: TextInput (Filament) - Mask: 9999 9999 9999 9999.
        - Nome do Titular: TextInput (Filament).
        - Data de Validade: TextInput (Filament) - Mask: 99/99.
        - Código de Segurança: TextInput (Filament) - Mask: 999.
        - CPF do Titular: TextInput (Filament) - Mask: 999.999.999-99.
      - Validações:
        - Número do Cartão: required, string, max:19.
        - Nome do Titular: required, string, max:255.
        - Data de Validade: required, string, max:5.
        - Código de Segurança: required, string, max:3.
        - CPF do Titular: required, string, max:14.
   - Informações de Endereço de Cobrança (Step 4):
      - Campos:
        - CEP: TextInput (Filament) - Mask: 99999-999.
        - Rua: TextInput (Filament).
        - Número: TextInput (Filament).
        - Complemento: TextInput (Filament).
        - Cidade: TextInput (Filament) - Disabled - Será preenchido através do CEP.
        - Estado: TextInput (Filament) - Disabled - Será preenchido através do CEP.
      - Validações:
        - CEP: required, string, max:8.
        - Rua: required, string, max:255.
        - Número: required, string, max:10.
        - Complemento: nullable, string, max:255.
        - Cidade: required, string, max:255.
        - Estado: required, string, max:255.
   - Detalhes sobre a assinatura (Step 5):
     - Card sobre o plano selecionado e o valor.
     - Card sobre inicio da assinatura e data de vencimento.
     - Card sobre a forma de pagamento selecionada.
     - Card sobre o endereço de cobrança.
     - Botão de confirmar.
- Ao finalizar:
  - Enviar email e notificação para o usuário informando que a assinatura foi realizada com sucesso.
  - Alterar o tipo do usuário para organizador e salvar os dados necessários.
  - Adicionar na tabela de histórico a ação realizada.
  - Redirecionar para a página de organizador.

### 3.3.3 Participantes Premium:

#### 3.3.3.1 Página de Assinatura

- Formulário Wizard:
    - Informações de Assinatura (Step 1):
        - Campos:
            - Plano: Select (Filament).
                - Opções:
                    - Mensal.
                    - Anual.
            - Forma de Pagamento: Select (Filament).
                - Opções:
                    - Cartão de Crédito.
                    - Cartão de Débito.
            - Termos de Uso: Checkbox (Filament).
        - Validações:
            - Plano: required, string, max:255.
            - Forma de Pagamento: required, string, max:255.
            - Termos de Uso: required, boolean.
    - Informações de Pagamento (Step 2):
        - Campos:
            - Número do Cartão: TextInput (Filament) - Mask: 9999 9999 9999 9999.
            - Nome do Titular: TextInput (Filament).
            - Data de Validade: TextInput (Filament) - Mask: 99/99.
            - Código de Segurança: TextInput (Filament) - Mask: 999.
            - CPF do Titular: TextInput (Filament) - Mask: 999.999.999-99.
        - Validações:
            - Número do Cartão: required, string, max:19.
            - Nome do Titular: required, string, max:255.
            - Data de Validade: required, string, max:5.
            - Código de Segurança: required, string, max:3.
            - CPF do Titular: required, string, max:14.
    - Informações de Endereço de Cobrança (Step 3):
        - Campos:
            - CEP: TextInput (Filament) - Mask: 99999-999.
            - Rua: TextInput (Filament).
            - Número: TextInput (Filament).
            - Complemento: TextInput (Filament).
            - Cidade: TextInput (Filament) - Disabled - Será preenchido através do CEP.
            - Estado: TextInput (Filament) - Disabled - Será preenchido através do CEP.
        - Validações:
            - CEP: required, string, max:8.
            - Rua: required, string, max:255.
            - Número: required, string, max:10.
            - Complemento: nullable, string, max:255.
            - Cidade: required, string, max:255.
            - Estado: required, string, max:255.
    - Detalhes sobre a assinatura (Step 5):
        - Card sobre o plano selecionado e o valor.
        - Card sobre inicio da assinatura e data de vencimento.
        - Card sobre a forma de pagamento selecionada.
        - Card sobre o endereço de cobrança.
        - Botão de confirmar.
- Ao finalizar:
    - Enviar email e notificação para o usuário informando que a assinatura foi realizada com sucesso.
    - Alterar o campo premium do usuário para true.
    - Adicionar na tabela de histórico a ação realizada.
    - Redirecionar para a página de eventos.

### 3.3.4 Sobre:

- Descrição do sistema.
- Texto sobre os desenvolvedores.

### 3.3.5 Contato:

- Formulário de contato:
    - Nome: TextInput (Filament).
    - E-mail: TextInput (Filament).
    - Mensagem: TextArea (Filament).

### 3.3.6 Favoritos:

#### 3.3.6.1 Página de Visualização:

- Apenas participantes podem acessar essa página de visualização de favoritos.
- Header:
    - Título: Favoritos.
- Grid:
    - Card Evento:
        - Usar componente de card de evento criado anteriormente.
          - Alterar o botão de inscrição para remover dos favoritos. 

### 3.3.7 Participações:

#### 3.3.7.1 Página de Visualização:

- Apenas participantes podem acessar essa página de visualização de participações.
- Header:
    - Título: Participações.
- Grid:
    - Card Evento:
        - Usar componente de card de evento criado anteriormente.

### 3.3.8 Configurações:

#### 3.3.8.1 Página de Visualização:

- Apenas participantes podem acessar essa página de visualização de configurações.
- Header:
    - Título: Configurações.
- Sections:
    - Seção 1:
        - Título: Perfil.
        - Campos: Nome(name), E-mail(email), Whatsapp(whatsapp).
    - Seção 2:
        - Título: Segurança.
        - Campo: Senha antiga(password), Nova senha(new_password), Confirmação nova senha(confirm_new_password).
