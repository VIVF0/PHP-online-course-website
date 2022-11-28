const Pix = require("./Pix");
const pix = new Pix(
  ">CHAVE PIX<",
  ">DESCRIÇÃO DO PAGAMENTO<",
  ">NOME DO BENEFICIADO<",
  ">CIDADE<",
  ">TXID<",
  80.0
);

const payload = pix.getPayload();