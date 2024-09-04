document.querySelectorAll(".excluir-button").forEach(btnDelete => {
  btnDelete.addEventListener("click", (event) => {
      let codigo = event.target.getAttribute('data-produto-cod');

      if (window.confirm("Tens certeza que desejas eliminar o produto de código " + codigo + "?")) {
          const dado = { accao: "btnDeleteClicado", produto_code: codigo };

          fetch("../php/excluir.php", {
              method: "POST",
              headers: {
                  "Content-Type": "application/json",
              },
              body: JSON.stringify(dado),
          })
          .then((response) => response.json())
          .then((data) => {
              window.alert(data.mensagem);
              // Recarrega a linha da tabela ou atualiza a lista de produtos
              if (data.mensagem.includes("sucesso")) {
                  const row = event.target.closest('tr');
                  row.parentNode.removeChild(row);
              }
          })
          .catch((erro) => {
              console.error("Erro:", erro);
          });
      } else {
          console.log("Clicou no cancelar");
      }
  });
});
