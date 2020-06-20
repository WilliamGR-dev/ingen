<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>InGen</title>
    <?php include './partials/head_assets.php'?>
    <script src="https://kit.fontawesome.com/1a0598dab9.js" crossorigin="anonymous"></script>
</head>
<body>

<header>
    <?php if(isset($_SESSION['user'])): if ($_SESSION['user']['is_admin']==1): include './partials/nav_admin.php'; else: include './partials/nav.php'; endif; else: include './partials/nav.php'; endif;  ?>
</header>
<div style="height: 10vh;"></div>
<div style="min-height: 90vh;display: flex;flex-direction: column;align-items: center;justify-content: flex-start;">
    <div class="profil">
        <div class="menuProfil">
            <div><h1>InGen</h1></div>
            <ul>
                <li><a href="index.php?p=contact">Nous contacter</a></li>
                <li><a href="index.php?p=cgv">CGV</a></li>
                <li><a href="index.php?p=info">Informations légales</a></li>
            </ul>
        </div>
        <div class="userInformation">
            <h2>CGV</h2>
            <div class="information">
                <div class="cgv"><p><strong>CONDITIONS GENERALES DE VENTE </strong><br> &nbsp;<br> Entre la Société <span class="societeID">InGen</span>,<br> <span class="societeID">2 avenue du stade de coubertin</span>,<br> au Capital Social de <span class="societeID">Paris</span><br> immatriculée au Registre du Commerce et des Sociétés de PARIS,<br> sous le numéro SIRET <span class="societeID">123456789</span><br> représentée par <span class="societeID">William</span> <span class="societeID">Girard-Reydet</span><br> &nbsp;en qualité de gérant, dûment habilité aux fins des présentes.<br> La société peut être jointe par email en cliquant sur le formulaire de contact
                        accessible via la page d’accueil du site. Ou directement en utilisant l’adresse <span class="societeID">2 avenue du stade de coubertin</span> <br><br> Ci-après le « Vendeur » ou la « Société ». D’une part, Et la personne
                        physique ou morale procédant à l’achat de produits ou services de la société,
                        Ci-après, « l’Acheteur », ou « le Client » D’autre part, Il a été exposé et
                        convenu ce qui suit :<br><br> <strong>PREAMBULE </strong><br><br> Le Vendeur est éditeur de Produits et Services de &nbsp;<span class="societeID">Génétique</span> à
                        destination de consommateurs, commercialisés par l’intermédiaire de ses sites
                        Internet (<span class="societeID">www.ingen.com</span>). La liste et le descriptif des biens et services
                        proposés par la Société peuvent être consultés sur les sites susmentionnés.<br><br> <strong>Article 1 : Objet</strong><br><br> Les présentes Conditions Générales de Vente déterminent les droits et
                        obligations des parties dans le cadre de la vente en ligne de Produits ou
                        Services proposés par le Vendeur.<br> &nbsp;<br><br> <strong>Article 2 : Dispositions générales </strong><br><br> Les présentes Conditions Générales de Vente (CGV) régissent les ventes de
                        Produits ou de Services, effectuées au travers des sites Internet de la
                        Société, et sont partie intégrante du Contrat entre l’Acheteur et le Vendeur.
                        Elle sont pleinement opposable à l’Acheteur qui les a accepté avant de passer
                        commande. Le Vendeur se réserve la possibilité de modifier les présentes, à
                        tout moment par la publication d’une nouvelle version sur son site Internet.
                        Les CGV applicables alors sont celles étant en vigueur à la date du paiement
                        (ou du premier paiement en cas de paiements multiples) de la commande. Ces CGV
                        sont consultables sur le site Internet de la Société à l’adresse suivante : <span class="societeID">www.ingen.com</span>.<br> La Société s’assure également que leur acceptation soit claire et sans réserve
                        en mettant en place une case à cocher et un clic de validation. Le Client
                        déclare avoir pris connaissance de l’ensemble des présentes Conditions
                        Générales de Vente, et le cas échéant des Conditions Particulières de Vente
                        liées à un produit ou à un service, et les accepter sans restriction ni
                        réserve.<br> Le Client reconnaît qu’il a bénéficié des conseils et informations nécessaires
                        afin de s’assurer de l’adéquation de l’offre à ses besoins.<br> Le Client déclare être en mesure de contracter légalement en vertu des lois
                        françaises ou valablement représenter la personne physique ou morale pour
                        laquelle il s’engage.<br> Sauf preuve contraire les informations enregistrées par la Société constituent
                        la preuve de l’ensemble des transactions.<br><br> <strong>Article 3 : Prix </strong><br><br> Les prix des produits vendus au travers des sites Internet sont indiqués en
                        Euros hors taxes et précisément déterminés sur les pages de descriptifs des
                        Produits. Ils sont également indiqués en euros toutes taxes comprises (TVA +
                        autres taxes éventuelles) sur la page de commande des produits, et hors frais
                        spécifiques d’expédition. Pour tous les produits expédiés hors Union européenne
                        et/ou DOM-TOM, le prix est calculé hors taxes automatiquement sur la facture.
                        Des droits de douane ou autres taxes locales ou droits d’importation ou taxes
                        d’état sont susceptibles d’être exigibles dans certains cas. Ces droits et
                        sommes ne relèvent pas du ressort du Vendeur. Ils seront à la charge de
                        l’acheteur et relèvent de sa responsabilité (déclarations, paiement aux
                        autorités compétentes, etc.). Le Vendeur invite à ce titre l’acheteur à se
                        renseigner sur ces aspects auprès des autorités locales correspondantes.La
                        Société se réserve la possibilité de modifier ses prix à tout moment pour
                        l’avenir. Les frais de télécommunication nécessaires à l’accès aux sites
                        Internet de la Société sont à la charge du Client. Le cas échéant également,
                        les frais de livraison.<br><br> <strong>Article 4 : Conclusion du contrat en ligne </strong><br><br> Conformément aux dispositions de l’article 1127-1 du Code civil, le Client doit
                        suivre une série d’étapes pour conclure le contrat par voie électronique pour
                        pouvoir réaliser sa commande :; Information sur les caractéristiques
                        essentielles du Produit ; – Choix du Produit, le cas échéant, de ses options –
                        Indication des coordonnées essentielles du Client (identification, email,
                        adresse…) ; – Acceptation des présentes Conditions Générales de Vente – Vérification
                        des éléments de la commande (formalité du double clic) et, le cas échéant,
                        correction des erreurs. Avant de procéder à sa confirmation, l’Acheteur a la
                        possibilité de vérifier le détail de sa commande, son prix, et de corriger ses
                        éventuelles erreur, ou annuler sa commande. La confirmation de la commande
                        emportera formation du présent contrat. – Ensuite, suivi des instructions pour
                        le paiement, paiement des produits, puis livraison de la commande. Le Client
                        recevra confirmation par courrier électronique du paiement de la commande,
                        ainsi qu’un accusé de réception de la commande la confirmant. Il recevra un
                        exemplaire .pdf des présentes conditions générales de vente.<br> Le client disposera pendant son processus de commande de la possibilité
                        d’identifier d’éventuelles erreurs commises dans la saisie des données et de
                        les corriger. La langue proposé pour la conclusion du contrat est la langue
                        française.<br> Les modalités de l’offre et des conditions générales de vente sont renvoyées
                        par email à l’acheteur lors de la commande et archivées sur le site web du
                        Vendeur. Le cas échéant, les règles professionnelles et commerciales auxquelles
                        l’auteur de l’offre entend se soumettre sont consultables dans la rubrique
                        «&nbsp;règles annexes&nbsp;» des présentes CGV, consultables sur le site du
                        Vendeur à l’adresse suivante&nbsp;: <span class="societeID">www.ingen.com</span><br> L’archivage des communications, de la commande, des détails de la commande,
                        ainsi que des factures est effectué sur un support fiable et durable de manière
                        constituer une copie fidèle et durable conformément aux dispositions de
                        l’article 1360 du code civil. Ces informations peuvent être produits à titre de
                        preuve du contrat.<br> Pour les produits livrés, la livraison se fera à l’adresse indiquée par le
                        Client. Aux fins de bonne réalisation de la commande, le Client s’engage à
                        fournir ses éléments d’identification véridiques. Le Vendeur se réserve la
                        possibilité de refuser la commande, par exemple pour toute demande anormale,
                        réalisée de mauvaise foi ou pour tout motif légitime.<br><br> <strong>Article 5 : Produits et services </strong><br><br> Les caractéristiques essentielles des biens, des services et leurs prix
                        respectifs sont mis à disposition de l’acheteur sur les sites Internet de la
                        société, de même, le cas échéant, que le mode d’utilisation du produit.
                        Conformément à l’article L112-1 du Code la consommation, le consommateur est
                        informé, par voie de marquage, d’étiquetage, d’affichage ou par tout autre
                        procédé approprié, des prix et des conditions particulières de la vente et de
                        l’exécution des services avant toute conclusion du contrat de vente. Dans tous
                        les cas, le montant total dû par l’Acheteur est indiqué sur la page de
                        confirmation de la commande. Le prix de vente du produit est celui en vigueur
                        indiqué au jour de la commande, celui-ci ne comportant par les frais de ports
                        facturés en supplément. Ces éventuels frais sont indiqués à l’Achteur lors du
                        process de vente, et en tout état de cause au moment de la confirmation de la
                        commande. Le Vendeur se réserve la possibilité de modifier ses prix à tout
                        moment, tout en garantissant l’application du prix indiqué au moment de la
                        commande. Lorsque les produits ou services ne sont pas exécuté immédiatement,
                        une information claire est donnée sur la page de présentation du produit quant
                        aux dates de livraison des produits ou services. Le client atteste avoir reçu
                        un détail des frais de livraison ainsi que les modalités de paiement, de
                        livraison et d’exécution du contrat, ainsi qu’une information détaillée
                        relative à l’identité du vendeur, ses coordonnées postales, téléphoniques et
                        électroniques, et à ses activités dans le contexte de la présente vente. Le
                        Vendeur s’engage à honorer la commande du Client dans la limite des stocks de
                        Produits disponibles uniquement. A défaut, le Vendeur en informe le Client ; si
                        la commande a été passée, et à défaut d’accord avec le Client sur une nouvelle
                        date de livraison, le Vendeur rembourse le client. Les informations
                        contractuelles sont présentées en détail et en langue française. Les parties
                        conviennent que les illustrations ou photos des produits offerts à la vente
                        n’ont pas de valeur contractuelle. La durée de validité de l’offre des Produits
                        ainsi que leurs prix est précisée sur les sites Internet de la Société, ainsi
                        que la durée minimale des contrats proposés lorsque ceux-ci portent sur une
                        fourniture continue ou périodique de produits ou services. Sauf conditions
                        particulières, les droits concédés au titre des présentes le sont uniquement à
                        la personne physique signataire de la commande (ou la personne titulaire de
                        l’adresse email communiqué).<br><br> <strong>Article 6 : Conformité </strong><br><br> Conformément à l’article L.411-1 du Code de la consommation, les produits et
                        les services offert à la vente au travers des présentes CGV répondent aux
                        prescriptions en vigueur relatives à la sécurité et à la santé des personnes, à
                        la loyauté des transactions commerciales et à la protection des consommateurs.
                        Indépendamment de toute garantie commerciale, le Vendeur reste tenu des défauts
                        de conformité et des vices cachés du produit.<br> Conformément à l’article L.217-4, le vendeur livre un bien conforme au contrat
                        et répond des défauts de conformité existant lors de la délivrance. Il répond
                        également des défauts de conformité résultant de l’emballage, des instructions
                        de montage ou de l’installation lorsque celleci a été mise à sa charge par le
                        contrat ou a été réalisée sous sa responsabilité.<br> Conformément aux dispositions légales en matière de conformité et de vices
                        cachés (art. 1641 c. civ.), le Vendeur rembourse ou échange les produits
                        défectueux ou ne correspondant pas à la commande. Le remboursement peut être
                        demandé de la manière suivante : dépôt d’une plainte à l’adresse <span class="societeID">2 avenue du stade de coubertin</span><br><br> <strong>Article 7 : Clause de réserve de propriété </strong><br><br> Les produits demeurent la propriété de la Société jusqu’au complet paiement du
                        prix.<br><br> <strong>Article 8 : Modalités de livraison </strong><br><br> Les produits sont livrés à l’adresse de livraison qui a été indiquée lors de la
                        commande et dans les délais indiqués. Ces délais ne prenent pas en compte le
                        délai de préparation de la commande. Lorsque le Client commande plusieurs
                        produits en même temps ceux-ci peuvent avoir des délais de livraison différents
                        acheminés selon les modalités suivantes&nbsp;: livraison via un ou plusieurs
                        colis. En cas de retard d’expédition dépôt d’une plainte à l’adresse <span class="societeID">2 avenue du stade de coubertin</span>. En
                        cas de retard de livraison, le Client dispose de la possibilité de résoudre le
                        contrat dans les conditions et modalités définies à l’Article L 138-2 du Code
                        de la consommation. Le Vendeur procède alors au remboursement du produit et aux
                        frais « aller » dans les conditions de l’Article L 138-3 du Code de la consommation.
                        Le Vendeur met à disposition un point de contact téléphonique (coût d’une
                        communication locale à partir d’un poste fixe) indiqué dans l’email de
                        confirmation de commande afin d’assurer le suivi de la commande. Le Vendeur
                        rappelle qu’au moment où le Client pend possession physiquement des produits,
                        les risques de perte ou d’endommagement des produits lui sont transférés. Il
                        appartient au Client de notifier au transporteur toute réserves sur le produit
                        livré.<br><br> <strong>Article 9 : Disponibilité et présentation </strong><br><br> En cas d’indisponibilité d’un article pour une période supérieure à 30 jours
                        ouvrables, vous serez immédiatement prévenu des délais prévisibles de livraison
                        et la commande de cet article pourra être annulée sur simple demande. Le Client
                        pourra alors demander un avoir pour le montant de l’article ou son
                        remboursement intégral et l’annulation de la commande.<br><br> <strong>Article 10 : Paiement </strong><br><br> Le paiement est exigible immédiatement à la commande, y compris pour les
                        produits en précommande. Le Client peut effectuer le règlement par carte de
                        paiement ou chèque bancaire. Les cartes émises par des banques domiciliées hors
                        de France doivent obligatoirement être des cartes bancaires internationales
                        (Mastercard ou Visa).Le paiement sécurisé en ligne par carte bancaire est
                        réalisé par notre prestataire de paiement. Les informations transmises sont
                        chiffrées dans les règles de l’art et ne peuvent être lues au cours du
                        transport sur le réseau. Une fois le paiement lancé par le Client, la
                        transaction est immédiatement débitée après vérification des informations.
                        Conformément aux dispositions du Code monétaire et financier, l’engagement de
                        payer donné par carte est irrévocable. En communiquant ses informations
                        bancaires lors de la vente, le Client autorise le Vendeur à débiter sa carte du
                        montant relatif au prix indiqué. Le Client confirme qu’il est bien le titulaire
                        légal de la carte à débiter et qu’il est légalement en droit d’en faire usage.
                        En cas d’erreur, ou d’impossibilité de débiter la carte, la Vente est
                        immédiatement résolue de plein droit et la commande annulée.<br><br> <strong>Article 11 : Délai de rétractation </strong><br><br> Conformément aux dispositions de l’article L 221-5 du Code de la consommation,
                        l’Acheteur dispose du droit de se rétracter sans donner de motif, dans un délai
                        de quatorze (14) jours à la date de réception de sa commande. Le droit de
                        rétractation peut être exercé en contactant la Société de la manière suivante :
                        dépôt d’une plainte à l’adresse <span class="societeID">2 avenue du stade de coubertin</span>. Nous informons les Clients que
                        conformément aux dispositions des articles L. 221-18 à L. 221-28 du Code de la
                        consommation, ce droit de rétractation ne peut être exercé pour tout article
                        dont un processus de fabrication ou d’acheminement est en cours. En cas
                        d’exercice du droit de rétractation dans le délai susmentionné, le prix du ou
                        des produits achetés et les frais d’envoi seront remboursés, les frais de
                        retour restant à la charge du Client. Les retours des produits sont à effectuer
                        dans leur état d’origine et complets (emballage, accessoires, notice…) ; ils
                        doivent si possible être accompagnés d’une copie du justificatif d’achat.
                        Conformément aux dispositions légales, vous pouvez demander le formulaire-type
                        de rétractation à nous adresser à l’adresse suivante : dépôt d’une plainte à
                        l’adresse <span class="societeID">2 avenue du stade de coubertin</span>. Procédure de remboursement : la procédure de
                        remboursement peut s’effectuer après une enquête sur le ou les produits
                        achetés, plus de détailsdépôt d’une plainte à l’adresse <span class="societeID">2 avenue du stade de coubertin</span><br><br> <strong>Article 12 : Garanties </strong><br><br> Conformément à la loi, le Vendeur assume les garanties suivantes : de
                        conformité et relative aux vices cachés des produits. Le Vendeur rembourse
                        l’acheteur ou échange les produits apparemment défectueux ou ne correspondant
                        pas à la commande effectuée. La demande de remboursement doit s’effectuer de la
                        manière suivante : dépôt d’une plainte à l’adresse <span class="societeID">2 avenue du stade de coubertin</span><br> &nbsp;Le Vendeur rappelle que le consommateur : – dispose d’un délai de 2 ans à
                        compter de la délivrance du bien pour agir auprès du Vendeur – qu’il peut
                        choisir entre le remplacement et la réparation du bien sous réserve des
                        conditions prévues par les dispositions susmentionnées. apparemment défectueux
                        ou ne correspondant – qu’il est dispensé d’apporter la preuve l’existence du
                        défaut de conformité du bien durant les six mois suivant la délivrance du bien.
                        – que, sauf biens d’occasion, ce délai sera porté à 24 mois à compter du 18
                        mars 2016 – que le consommateur peut également faire valoir la garantie contre
                        les vices cachés de la chose vendue au sens de l’article 1641 du code civil et,
                        dans cette hypothèse, il peut choisir entre la résolution de la vente ou une
                        réduction du prix de vente (dispositions des articles 1644 du Code Civil).
                        Garanties complémentaires : _____ (décrire vos garanties complémentaires)<br><br> <strong>Article 13 : Réclamations et mediation</strong><br><br> &nbsp;Le cas échéant, l’Acheteur peut présenter toute réclamation en contactant
                        la société au moyen des coordonnées suivantes dépôt d’une plainte à l’adresse <span class="societeID">2 avenue du stade de coubertin</span>. Conformément aux dispositions des art. L. 611-1 à L. 616-3 du Code
                        de la consommation, le consommateur est informé qu’il peut recourir à un
                        médiateur de la consommation dans les conditions prévues par le titre Ier du
                        livre VI du code de la consommation. En cas d’échec de la demande de
                        réclamation auprès du service client du Vendeur, ou en l’absence de réponse
                        dans un délai de deux mois, le consommateur peut soumettre le différent à un
                        médiateur qui tentera en toute indépendance de rapprocher les parties en vue
                        d’obtenir une solution amiable.<br><br> <strong>Article 14 : résolution du contrat </strong><br><br> La commande peut être résolue par l’acheteur par lettre recommandée avec
                        demande d’avis de réception dans les cas suivants : — livraison d’un produit
                        non conforme aux caractéristiques de la commande ; — livraison dépassant la
                        date limite fixée lors de la commande ou, à défaut de date, dans les trente
                        jours suivant le paiement ; — de hausse du prix injustifiée ou de modification
                        du produit. Dans ces cas, l’acheteur peut exiger le remboursement de l’acompte
                        versé majoré des intérêts calculés au taux légal à partir de la date
                        d’encaissement de l’acompte.<br><br> <strong>Article 15 : Droits de propriété intellectuelle </strong><br><br> Les marques, noms de domaines, produits, logiciels, images, vidéos, textes ou
                        plus généralement toute information objet de droits de propriété intellectuelle
                        sont et restent la propriété exclusive du vendeur. Aucune cession de droits de
                        propriété intellectuelle n’est réalisée au travers des présentes CGV. Toute
                        reproduction totale ou partielle, modification ou utilisation de ces biens pour
                        quelque motif que ce soit est strictement interdite.<br><br> <strong>Article 16 : Force majeure </strong><br><br> L’exécution des obligations du vendeur au terme des présentes est suspendue en
                        cas de survenance d’un cas fortuit ou de force majeure qui en empêcherait
                        l’exécution. Le vendeur avisera le client de la survenance d’un tel évènement
                        dès que possible.<br><br> <strong>Article 17 : Nullité et modification du contrat </strong><br><br> Si l’une des stipulations du présent contrat était annulée, cette nullité
                        n’entraînerait pas la nullité des autres stipulations qui demeureront en
                        vigueur entre les parties. Toute modification contractuelle n’est valable
                        qu’après un accord écrit et signé des parties. Article 18 : Protection des
                        données personnelles Conformément au Règlement 2016/679 du 27 avril 2016
                        relatif à la protection des personnes physiques à l’égard du traitement des
                        données à caractère personnel et à la libre circulation de ces données, le
                        Vendeur met en place un traitement de données personnelles qui a pour finalité
                        la vente et la livraison de produits et services définis au présent contrat.
                        L’Acheteur est informé des éléments suivants : – l’identité et les coordonnées du
                        responsable du traitement et, le cas échéant, du représentant du responsable du
                        traitement : le Vendeur, tel qu’indiqué en haut des présentes CGV ; – les
                        coordonnées du délégué à la protection des données&nbsp;: ……. – la base
                        juridique du traitement : l’exécution contractuelle – les destinataires ou les
                        catégories de destinataires des données à caractère personnel, s’ils
                        existent&nbsp;&nbsp;: le responsable du traitement, ses services en charge du
                        marketing, les services en charge de la sécurité informatique, le service en
                        charge de la vente, de la livraison et de la commande, les sous-traitant
                        intervenants dans les opérations de livraison et de vente ainsi que toute
                        autorité légalement autorisée à accéder aux données personnelles en question –
                        aucun transfert hors UE n’est prévu – la durée de conservation des données : le
                        temps de la prescription commerciale – la personne concernée dispose du droit
                        de demander au responsable du traitement l’accès aux données à caractère
                        personnel, la rectification ou l’effacement de celles-ci, ou une limitation du
                        traitement relatif à la personne concernée, ou du droit de s’opposer au
                        traitement et du droit à la portabilité des données – La personne concernée a
                        le droit d’introduire une réclamation auprès d’une autorité de contrôle – les
                        informations demandées lors de la commande sont nécessaires à l’établissement
                        de la facture (obligation légale) et la livraison des biens commandés, sans
                        quoi la commande ne pourras pas être passée. Aucune décision automatisée ou
                        profilage n’est mis en oeuvre au travers du processus de commande.<br><br> <strong>Article 18 : Droit applicable et clauses </strong><br><br> Toutes les clauses figurant dans les présentes conditions générales de vente,
                        ainsi que toutes les opérations d’achat et de vente qui y sont visées, seront
                        soumises au droit français. La nullité d’une clause contractuelle n’entraîne
                        pas la nullité des présentes conditions générales de vente.<br><br> <strong>Article 19 : Information des consommateurs</strong><br><br> &nbsp;Aux fins d’information des consommateurs, les dispositions du code civil
                        et du code de la consommation sont reproduites ci-après : Aricle 1641 du Code
                        civil : Le vendeur est tenu de la garantie à raison des défauts cachés de la
                        chose vendue qui la rendent impropre à l’usage auquel on la destine, ou qui
                        diminuent tellement cet usage que l’acheteur ne l’aurait pas acquise, ou n’en
                        aurait donné qu’un moindre prix, s’il les avait connus. Aricle 1648 du Code
                        civil : L’action résultant des vices rédhibitoires doit être intentée par
                        l’acquéreur dans un délai de deux ans à compter de la découverte du vice. Dans
                        le cas prévu par l’article 1642-1, l’action doit être introduite, à peine de
                        forclusion, dans l’année qui suit la date à laquelle le vendeur peut être
                        déchargé des vices ou des défauts de conformité apparents.<br> Article L. 217-4 du Code de la consommation : Le vendeur livre un bien conforme
                        au contrat et répond des défauts de conformité existant lors de la délivrance.
                        Il répond également des défauts de conformité résultant de l’emballage, des
                        instructions de montage ou de l’installation lorsque celle-ci a été mise à sa
                        charge par le contrat ou a été réalisée sous sa responsabilité.<br> Article L. 217-5 du Code de la consommation : Le bien est conforme au contrat :
                        1° S’il est propre à l’usage habituellement attendu d’un bien semblable et, le
                        cas échéant : – s’il correspond à la description donnée par le vendeur et
                        possède les qualités que celui-ci a présentées à l’acheteur sous forme
                        d’échantillon ou de modèle ; – s’il présente les qualités qu’un acheteur peut
                        légitimement attendre eu égard aux déclarations publiques faites par le
                        vendeur, par le producteur ou par son représentant, notamment dans la publicité
                        ou l’étiquetage ; 2° Ou s’il présente les caractéristiques définies d’un commun
                        accord par les parties ou est propre à tout usage spécial recherché par
                        l’acheteur, porté à la connaissance du vendeur et que ce dernier a accepté.<br> Article L. 217-12 du Code de la consommation : L’action résultant du défaut de
                        conformité se prescrit par deux ans à compter de la délivrance du bien.<br> Article L. 217-16 du Code de la consommation : Lorsque l’acheteur demande au
                        vendeur, pendant le cours de la garantie commerciale qui lui a été consentie
                        lors de l’acquisition ou de la réparation d’un bien meuble, une remise en état
                        couverte par la garantie, toute période d’immobilisation d’au moins sept jours
                        vient s’ajouter à la durée de la garantie qui restait à courir. Cette période
                        court à compter de la demande d’intervention de l’acheteur ou de la mise à
                        disposition pour réparation du bien en cause, si cette mise à disposition est
                        postérieure à la demande d’intervention.</p></div>
            </div>
        </div>
    </div>
</div>
</body>



<?php include './partials/footer.php';?>