<?php
$mensagem = "";
$tipoMensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $curso = $_POST["curso"];

    try {
        $conexao = new PDO("mysql:host=localhost;dbname=sistema_poliglota;charset=utf8mb4", "root", "");
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO alunos (nome, curso) VALUES (:nome, :curso)";
        $stmt = $conexao->prepare($sql);
        $stmt->execute([
            ':nome' => $nome,
            ':curso' => $curso
        ]);

        $mensagem = "Aluno cadastrado com sucesso! Aguardando processamento Java.";
        $tipoMensagem = "sucesso";
    } catch (PDOException $e) {
        $mensagem = "Erro no cadastro: " . $e->getMessage();
        $tipoMensagem = "erro";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Poliglota - Cadastro</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-md bg-slate-800 border border-slate-700 rounded-xl shadow-2xl p-6">
        
        <div class="mb-6 text-center">
            <h1 class="text-2xl font-bold text-white tracking-wide">Sistema Poliglota</h1>
            <p class="text-slate-400 text-sm mt-1">Módulo 1: Cadastro via PHP & PDO</p>
        </div>

        <form method="POST" class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-1">Nome Completo</label>
                <input type="text" name="nome" placeholder="Digite o nome do aluno" required 
                    class="w-full px-3 py-2 bg-slate-900 border border-slate-700 rounded-lg text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
            </div>
            
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-1">Curso</label>
                <input type="text" name="curso" placeholder="Ex: Desenvolvimento de Sistemas" required 
                    class="w-full px-3 py-2 bg-slate-900 border border-slate-700 rounded-lg text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
            </div>
            
            <button type="submit" 
                class="w-full py-2.5 px-4 bg-blue-600 hover:bg-blue-500 text-white font-medium rounded-lg shadow-lg hover:shadow-blue-500/20 active:scale-[0.98] transition duration-150">
                Cadastrar Aluno
            </button>
        </form>

        <?php if ($mensagem): ?>
            <div class="mt-5 p-3 rounded-lg text-sm border flex items-start gap-2 
                <?= $tipoMensagem === 'sucesso' 
                    ? 'bg-emerald-950/50 border-emerald-500/40 text-emerald-300' 
                    : 'bg-rose-950/50 border-rose-500/40 text-rose-300' ?>">
                <span><?= $tipoMensagem === 'sucesso' ? '✓' : '✕' ?></span>
                <p><?= htmlspecialchars($mensagem) ?></p>
            </div>
        <?php endif; ?>

    </div>

</body>
</html>