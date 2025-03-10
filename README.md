# Intelicampo - Tecnologia para Fazendas

O **Intelicampo** é uma solução completa de tecnologia para gestão de fazendas de corte e leite. Utilizando Internet das Coisas (IoT) e servidores em nuvem, o sistema coleta e analisa dados em tempo real, ajudando os produtores rurais a aumentar a produtividade, reduzir custos e tomar decisões mais assertivas.

## Funcionalidades Principais

- **Gerenciamento de Animais**:
  - Coleta em tempo real de pesos, ganhos de peso e produção diária de leite.
  - Gerenciamento de piquetes e lotes lógicos de animais.

- **Dispositivos IoT Integrados**:
  - Balança inteligente autônoma.
  - Sensor de peso do leite integrado com ordenhadeiras.
  - Alerta de mastite através da condutividade do leite.
  - Unidade remota para atividades no campo.

- **Controle Financeiro**:
  - Plano de contas completo e parametrizado (despesas, receitas, investimentos e pró-labore).

- **Gestão de Manejos**:
  - Acompanhamento de vacinações, doenças, medicamentos, inseminações e ciclo de vida dos animais.

- **Controle de Tarefas**:
  - Calendário de acompanhamento de tarefas internas da propriedade rural.

- **Parâmetros Personalizáveis**:
  - O usuário pode parametrizar o sistema de acordo com as necessidades da fazenda.

## Tecnologias Utilizadas

- **Frontend**:
  - HTML5, CSS3 e JavaScript para a interface do usuário.
  - [Bootstrap](https://getbootstrap.com/) para design responsivo e componentes estilizados.
  - [SweetAlert2](https://sweetalert2.github.io/) para alertas estilizados.

- **Backend**:
  - PHP para processamento do formulário e envio de e-mails.
  - [PHPMailer](https://github.com/PHPMailer/PHPMailer) para envio de e-mails via SMTP.

- **Ferramentas**:
  - Git para controle de versão.
  - GitHub para hospedagem do repositório.

## Como Executar o Projeto

### Pré-requisitos

- Servidor web (como Apache ou Nginx) com suporte a PHP.
- PHP 7.0 ou superior.
- Composer (para instalar dependências, se necessário).
- Acesso a um servidor SMTP (como o Gmail) para envio de e-mails.

### Passos para Configuração

1. **Clone o repositório**:
   ```bash
   git clone https://github.com/PedroIvoLeite/intelicampo.git
   cd intelicampo
