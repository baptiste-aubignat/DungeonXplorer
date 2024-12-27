<?php
class adminPanelController {

    function index() {
        session_start();
        if (!isset($_SESSION["user"])) {
            echo "Pas connecté";
            die();
        }

        $conn = Database::connect();
        $query = "SELECT isAdmin from Account where name = '".$_SESSION["user"]."';";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $recu = $stmt->fetch(PDO::FETCH_ASSOC);

        if($recu['isAdmin'] == 1) {
            echo "Bienvenue sur le panneau de contrôle, modifiez ici tout à votre guise";
        } else {
            echo "Vous n'avez pas les droits";
        }

        echo '<form method="POST" action="">';
        echo    '<p> Choisissez une table à mettre a jour <br> </p>';
        echo    '<p> 1 : Account | 2 : Armor | 3 : Chapter | 4 : Chapter Treasure | 5 : Class |
        6 : Encounter | 7 : Hero | 8 : Hero_List | 9 : Inventory | 10 : Items <br> 11 : Level | 12 : Links | 13 : Loot | 14 : Monster | 15 : Potion | 16 : Scroll | 17 :  Shield | 18 : Spell | 19 : Spell List | 20 : Sword</p>';
        echo    '<label for="number">Entrez une valeur entre 1 et 20 :</label><br>';
        echo    '<input type="number" id="valeur" name="number" min="1" max="20" required><br>';
        echo    '<button type="submit">Sélectionner </button>';
        echo '</form>';
        
        // Vérification si le formulaire a été soumis
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Récupérer la valeur envoyée par l'utilisateur
            $number = isset($_POST['number']) ? (int)$_POST['number'] : 0;
            switch($number) {
                case 1 : 
                    echo "Table Account";
                    echo "<br>";
                    $conn = Database::connect();
                    $query = "SELECT * from Account";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    while($recu = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo $recu['account_id'] . " " . $recu['name'] . " " . $recu['email'] . " " . $recu['password'] . " " . $recu['isAdmin'] . "<br>";
                    }
                    echo '<form method="post" action="">';
                    echo '<input type="hidden" name="number" value="1">';
                    echo "<br>" . '<button type="submit" name="action" value="insert"> Insert </button>' . " " . '<button type="submit" name="action" value="update"> Update </button>';
                    echo '</form>';
                    if(isset($_POST['action'])) {
                        if($_POST['action'] === 'insert') {
                            echo '<form method="post">';
                            echo '<input type="text" id="name" name="name" placeholder="name" required><br>';
                            echo '<input type="text" id="email" name="email" placeholder="email" required><br>';
                            echo '<input type="text" id="password" name="password" placeholder="password" required><br>';
                            echo '<input type="number" id="isAdmin" name="isAdmin" min="0" max="1" required><br>';
                            echo '<button type="submit" name="inserer" value="inserer">Insérer</button>';
                            echo '</form>';
                            if(isset($_POST['inserer'])) {
                                if($_POST['inserer'] === 'inserer') {
                                    $name = $_POST['name'];
                                    $email = $_POST['email'];
                                    $password = sha1($_POST['password']);
                                    $isAdmin = $_POST['isAdmin'];

                                    $query = "INSERT INTO Account (name, email, password, isAdmin) VALUES (?, ?, ?, ?)";
                                    $stmt = $conn->prepare($query);
                                    $stmt->execute(array($name, $email, $password, $isAdmin));

                                    echo "Insertion effectuée";
                                }
                            }
                        } elseif($_POST['action'] === 'update') {
                            echo "update";
                        }
                    }
                    break;

                case 2 : 
                    echo "Table Armor";
                    echo "<br>";
                    $conn = Database::connect();
                    $query = "SELECT * from Armor";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    while($recu = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo $recu['armor_id'] . " " . $recu['item_id'] . " " . $recu['armor_bonus'] . " " . $recu['type'] . "<br>";
                    }
                    echo '<form method="post" action="">';
                    echo '<input type="hidden" name="number" value="2">';
                    echo "<br>" . '<button type="submit" name="action" value="insert"> Insert </button>' . " " . '<button type="submit" name="action" value="update"> Update </button>';
                    echo '</form>';
                    if(isset($_POST['action'])) {
                        if($_POST['action'] === 'insert') {
                            echo '<form method="post">';
                            echo '<input type="number" id="item_id" name="item_id" placeholder="item_id" required><br>';
                            echo '<input type="number" id="armor_bonus" name="armor_bonus" placeholder="armor_bonus" required><br>';
                            echo '<input type="text" id="type" name="type" placeholder="type" required><br>';
                            echo '<button type="submit" name="inserer" value="inserer">Insérer</button>';
                            echo '</form>';
                            if(isset($_POST['inserer'])) {
                                if($_POST['inserer'] === 'inserer') {
                                    $item_id = $_POST['item_id'];
                                    $armor_bonus = $_POST['armor_bonus'];
                                    $type = $_POST['type'];

                                    $query = "INSERT INTO Armor (item_id, armor_bonus, type) VALUES (?, ?, ?)";
                                    $stmt = $conn->prepare($query);
                                    $stmt->execute(array($item_id, $armor_bonus, $type));

                                    echo "Insertion effectuée";
                                }
                            }
                        } elseif($_POST['action'] === 'update') {
                            echo "update";
                        }
                    }
                    break;

                case 3 : 
                    echo "Table Chapter";
                    echo "<br>";
                    $conn = Database::connect();
                    $query = "SELECT * from Chapter";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    while($recu = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo $recu['chapter_id'] . " " . $recu['content'] . " " . $recu['image'] . "<br>";
                    }
                    echo '<form method="post" action="">';
                    echo '<input type="hidden" name="number" value="3">';
                    echo "<br>" . '<button type="submit" name="action" value="insert"> Insert </button>' . " " . '<button type="submit" name="action" value="update"> Update </button>';
                    echo '</form>';
                    if(isset($_POST['action'])) {
                        if($_POST['action'] === 'insert') {
                            echo '<form method="post">';
                            echo '<input type="text" id="content" name="content" placeholder="content" required><br>';
                            echo '<input type="text" id="image" name="image" placeholder="image" required><br>';
                            echo '<button type="submit" name="inserer" value="inserer">Insérer</button>';
                            echo '</form>';
                            if(isset($_POST['inserer'])) {
                                if($_POST['inserer'] === 'inserer') {
                                    $content = $_POST['content'];
                                    $image = $_POST['image'];

                                    $query = "INSERT INTO Chapter (content, image) VALUES (?, ?)";
                                    $stmt = $conn->prepare($query);
                                    $stmt->execute(array($content, $image));

                                    echo "Insertion effectuée";
                                }
                            }
                        } elseif($_POST['action'] === 'update') {
                            echo "update";
                        }
                    }
                    break;
                
                case 4 : 
                    echo "Table Chapter_Treasure";
                    echo "<br>";
                    $conn = Database::connect();
                    $query = "SELECT * from Chapter_Treasure";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    while($recu = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo $recu['chap_treasure_id'] . " " . $recu['chapter_id'] . " " . $recu['item_id'] . " " . $recu['quantity'] . " " . $recu['probability'] . " " . $recu['class_id'] . "<br>";
                    }
                    echo '<form method="post" action="">';
                    echo '<input type="hidden" name="number" value="4">';
                    echo "<br>" . '<button type="submit" name="action" value="insert"> Insert </button>' . " " . '<button type="submit" name="action" value="update"> Update </button>';
                    echo '</form>';
                    if(isset($_POST['action'])) {
                        if($_POST['action'] === 'insert') {
                            echo '<form method="post">';
                            echo '<input type="number" id="chapter_id" name="chapter_id" placeholder="chapter_id" required><br>';
                            echo '<input type="number" id="item_id" name="item_id" placeholder="item_id" required><br>';
                            echo '<input type="number" id="quantity" name="quantity" placeholder="quantity" required><br>';
                            echo '<input type="number" id="probability" name="probability" placeholder="probability" required><br>';
                            echo '<input type="number" id="class_id" name="class_id" placeholder="class_id" required><br>';
                            echo '<button type="submit" name="inserer" value="inserer">Insérer</button>';
                            echo '</form>';
                            if(isset($_POST['inserer'])) {
                                if($_POST['inserer'] === 'inserer') {
                                    $chapter_id = $_POST['chapter_id'];
                                    $item_id = $_POST['item_id'];
                                    $quantity = $_POST['quantity'];
                                    $probability = $_POST['probability'];
                                    $class_id = $_POST['class_id'];

                                    $query = "INSERT INTO Chapter_Treasure (chapter_id, item_id, quantity, probability, class_id) VALUES (?, ?, ?, ?, ?)";
                                    $stmt = $conn->prepare($query);
                                    $stmt->execute(array($chapter_id, $item_id, $quantity, $probability, $class_id));

                                    echo "Insertion effectuée";
                                }
                            }
                        } elseif($_POST['action'] === 'update') {
                            echo "update";
                        }
                    }
                    break;

                case 5 : 
                    echo "Table Class";
                    echo "<br>";
                    $conn = Database::connect();
                    $query = "SELECT * from Class";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    while($recu = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo $recu['class_id'] . " " . $recu['name'] . " " . $recu['description'] . " " . $recu['base_pv'] . " " . $recu['base_mana'] . " " . $recu['strength'] . " " . $recu['initiative'] . " " . $recu['max_items'] . "<br>";
                    }
                    echo '<form method="post" action="">';
                    echo '<input type="hidden" name="number" value="5">';
                    echo "<br>" . '<button type="submit" name="action" value="insert"> Insert </button>' . " " . '<button type="submit" name="action" value="update"> Update </button>';
                    echo '</form>';
                    if(isset($_POST['action'])) {
                        if($_POST['action'] === 'insert') {
                            echo '<form method="post">';
                            echo '<input type="text" id="name" name="name" placeholder="name" required><br>';
                            echo '<input type="text" id="description" name="description" placeholder="description" required><br>';
                            echo '<input type="number" id="base_pv" name="base_pv" placeholder="base_pv" required><br>';
                            echo '<input type="number" id="base_mana" name="base_mana" placeholder="base_mana" required><br>';
                            echo '<input type="number" id="strength" name="strength" placeholder="strength" required><br>';
                            echo '<input type="number" id="initiative" name="initiative" placeholder="initiative" required><br>';
                            echo '<input type="number" id="max_items" name="max_items" placeholder="max_items" required><br>';
                            echo '<button type="submit" name="inserer" value="inserer">Insérer</button>';
                            echo '</form>';
                            if(isset($_POST['inserer'])) {
                                if($_POST['inserer'] === 'inserer') {
                                    $name = $_POST['name'];
                                    $description = $_POST['description'];
                                    $base_pv = $_POST['base_pv'];
                                    $base_mana = $_POST['base_mana'];
                                    $strength = $_POST['strength'];
                                    $initiative = $_POST['initiative'];
                                    $max_items = $_POST['max_items'];

                                    $query = "INSERT INTO Class (name, description, base_pv, base_mana, strength, initiative, max_items) VALUES (?, ?, ?, ?, ?, ?, ?)";
                                    $stmt = $conn->prepare($query);
                                    $stmt->execute(array($name, $description, $base_pv, $base_mana, $strength, $initiative, $max_items));

                                    echo "Insertion effectuée";
                                }
                            }
                        } elseif($_POST['action'] === 'update') {
                            echo "update";
                        }
                    }
                    break;

                case 6 : 
                    echo "Table Encounter";
                    echo "<br>";
                    $conn = Database::connect();
                    $query = "SELECT * from Encounter";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    while($recu = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo $recu['encounter_id'] . " " . $recu['chapter_id'] . " " . $recu['monster_id'] . "<br>";
                    }
                    echo '<form method="post" action="">';
                    echo '<input type="hidden" name="number" value="6">';
                    echo "<br>" . '<button type="submit" name="action" value="insert"> Insert </button>' . " " . '<button type="submit" name="action" value="update"> Update </button>';
                    echo '</form>';
                    if(isset($_POST['action'])) {
                        if($_POST['action'] === 'insert') {
                            echo '<form method="post">';
                            echo '<input type="number" id="chapter_id" name="chapter_id" placeholder="chapter_id" required><br>';
                            echo '<input type="number" id="monster_id" name="monster_id" placeholder="monster_id" required><br>';
                            echo '<button type="submit" name="inserer" value="inserer">Insérer</button>';
                            echo '</form>';
                            if(isset($_POST['inserer'])) {
                                if($_POST['inserer'] === 'inserer') {
                                    $chapter_id = $_POST['chapter_id'];
                                    $monster_id = $_POST['monster_id'];

                                    $query = "INSERT INTO Encounter (chapter_id, monster_id) VALUES (?, ?)";
                                    $stmt = $conn->prepare($query);
                                    $stmt->execute(array($chapter_id, $monster_id, $type));

                                    echo "Insertion effectuée";
                                }
                            }
                        } elseif($_POST['action'] === 'update') {
                            echo "update";
                        }
                    }
                    break;
                
                case 7 : 
                    echo "Table Hero";
                    echo "<br>";
                    $conn = Database::connect();
                    $query = "SELECT * from Hero";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    while($recu = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo $recu['hero_id'] . " " . $recu['name'] . " " . $recu['class_id'] . " " . $recu['image'] . " " . $recu['biography'] . " " . $recu['pv'] . " " . $recu['mana'] . " " . $recu['strength'] . " " . $recu['initiative'] . " " . $recu['armor_id'] . " " . $recu['left_hand_id'] . " " . $recu['right_hand_id'] . " " . $recu['chapter_id'] . " " . $recu['xp'] . " " . $recu['current_level'] . "<br>";
                    }
                    echo '<form method="post" action="">';
                    echo '<input type="hidden" name="number" value="7">';
                    echo "<br>" . '<button type="submit" name="action" value="insert"> Insert </button>' . " " . '<button type="submit" name="action" value="update"> Update </button>';
                    echo '</form>';
                    if(isset($_POST['action'])) {
                        if($_POST['action'] === 'insert') {
                            echo '<form method="post">';
                            echo '<input type="text" id="name" name="name" placeholder="name" required><br>';
                            echo '<input type="number" id="class_id" name="class_id" placeholder="class_id" required><br>';
                            echo '<input type="text" id="image" name="image" placeholder="image" required><br>';
                            echo '<input type="text" id="biography" name="biography" placeholder="biography" required><br>';
                            echo '<input type="number" id="pv" name="pv" placeholder="pv" required><br>';
                            echo '<input type="number" id="mana" name="mana" placeholder="mana" required><br>';
                            echo '<input type="number" id="strength" name="strength" placeholder="strength" required><br>';
                            echo '<input type="number" id="initiative" name="initiative" placeholder="initiative" required><br>';
                            echo '<input type="number" id="armor_id" name="armor_id" placeholder="armor_id" required><br>';
                            echo '<input type="number" id="left_hand_id" name="left_hand_id" placeholder="left_hand_id" required><br>';
                            echo '<input type="number" id="right_hand_id" name="right_hand_id" placeholder="right_hand_id" required><br>';
                            echo '<input type="number" id="chapter_id" name="chapter_id" placeholder="chapter_id" required><br>';
                            echo '<input type="number" id="xp" name="xp" placeholder="xp" required><br>';
                            echo '<input type="number" id="current_level" name="current_level" placeholder="current_level" required><br>';
                            echo '<button type="submit" name="inserer" value="inserer">Insérer</button>';
                            echo '</form>';
                            if(isset($_POST['inserer'])) {
                                if($_POST['inserer'] === 'inserer') {
                                    $name = $_POST['name'];
                                    $class_id = $_POST['class_id'];
                                    $image = $_POST['image'];
                                    $biography = $_POST['biography'];
                                    $pv = $_POST['pv'];
                                    $mana = $_POST['mana'];
                                    $initiative_bonus = $_POST['strength'];
                                    $initiative = $_POST['initiative'];
                                    $armor_id = $_POST['armor_id'];
                                    $left_hand_id = $_POST['left_hand_id'];
                                    $right_hand_id = $_POST['right_hand_id'];
                                    $chapter_id = $_POST['chapter_id'];
                                    $xp = $_POST['xp'];
                                    $current_level = $_POST['current_level'];

                                    $query = "INSERT INTO Hero (name, class_id, image, biography, pv, mana, strength, initiative, armor_id, left_hand_id, right_hand_id, chapter_id, xp, current_level) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                                    $stmt = $conn->prepare($query);
                                    $stmt->execute(array($name, $class_id, $image, $biography, $pv, $mana, $strength, $initiative, $armor_id, $left_hand_id, $right_hand_id, $chapter_id, $xp, $current_level));

                                    echo "Insertion effectuée";
                                }
                            }
                        } elseif($_POST['action'] === 'update') {
                            echo "update";
                        }
                    }
                    break;
                
                case 8 : 
                    echo "Table Hero_list";
                    echo "<br>";
                    $conn = Database::connect();
                    $query = "SELECT * from Hero_list";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    while($recu = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo $recu['hero_list_id'] . " " . $recu['account_id'] . " " . $recu['hero_id'] . "<br>";
                    }
                    echo '<form method="post" action="">';
                    echo '<input type="hidden" name="number" value="8">';
                    echo "<br>" . '<button type="submit" name="action" value="insert"> Insert </button>' . " " . '<button type="submit" name="action" value="update"> Update </button>';
                    echo '</form>';
                    if(isset($_POST['action'])) {
                        if($_POST['action'] === 'insert') {
                            echo '<form method="post">';
                            echo '<input type="number" id="account_id" name="account_id" placeholder="account_id" required><br>';
                            echo '<input type="number" id="hero_id" name="hero_id" placeholder="hero_id" required><br>';
                            echo '<button type="submit" name="inserer" value="inserer">Insérer</button>';
                            echo '</form>';
                            if(isset($_POST['inserer'])) {
                                if($_POST['inserer'] === 'inserer') {
                                    $account_id = $_POST['account_id'];
                                    $hero_id = $_POST['hero_id'];

                                    $query = "INSERT INTO Hero_list (account_id, hero_id) VALUES (?, ?)";
                                    $stmt = $conn->prepare($query);
                                    $stmt->execute(array($account_id, $hero_id));

                                    echo "Insertion effectuée";
                                }
                            }
                        } elseif($_POST['action'] === 'update') {
                            echo "update";
                        }
                    }
                    break;

                case 9 : 
                    echo "Table Inventory";
                    echo "<br>";
                    $conn = Database::connect();
                    $query = "SELECT * from Inventory";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    while($recu = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo $recu['inventory_id'] . " " . $recu['hero_id'] . " " . $recu['item_id'] . " " . $recu['quantity'] . "<br>";
                    }
                    echo '<form method="post" action="">';
                    echo '<input type="hidden" name="number" value="9">';
                    echo "<br>" . '<button type="submit" name="action" value="insert"> Insert </button>' . " " . '<button type="submit" name="action" value="update"> Update </button>';
                    echo '</form>';
                    if(isset($_POST['action'])) {
                        if($_POST['action'] === 'insert') {
                            echo '<form method="post">';
                            echo '<input type="number" id="hero_id" name="hero_id" placeholder="hero_id" required><br>';
                            echo '<input type="number" id="item_id" name="item_id" placeholder="item_id" required><br>';
                            echo '<input type="number" id="quantity" name="quantity" placeholder="quantity" required><br>';
                            echo '<button type="submit" name="inserer" value="inserer">Insérer</button>';
                            echo '</form>';
                            if(isset($_POST['inserer'])) {
                                if($_POST['inserer'] === 'inserer') {
                                    $item_id = $_POST['item_id'];
                                    $hero_id = $_POST['hero_id'];
                                    $quantity = $_POST['quantity'];

                                    $query = "INSERT INTO Inventory (hero_id, item_id, quantity) VALUES (?, ?, ?)";
                                    $stmt = $conn->prepare($query);
                                    $stmt->execute(array($hero_id, $item_id, $quantity));

                                    echo "Insertion effectuée";
                                }
                            }
                        } elseif($_POST['action'] === 'update') {
                            echo "update";
                        }
                    }
                    break;

                case 10 : 
                    echo "Table Items";
                    echo "<br>";
                    $conn = Database::connect();
                    $query = "SELECT * from Items";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    while($recu = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo $recu['item_id'] . " " . $recu['name'] . " " . $recu['description'] . "<br>";
                    }
                    echo '<form method="post" action="">';
                    echo '<input type="hidden" name="number" value="10">';
                    echo "<br>" . '<button type="submit" name="action" value="insert"> Insert </button>' . " " . '<button type="submit" name="action" value="update"> Update </button>';
                    echo '</form>';
                    if(isset($_POST['action'])) {
                        if($_POST['action'] === 'insert') {
                            echo '<form method="post">';
                            echo '<input type="text" id="name" name="name" placeholder="name" required><br>';
                            echo '<input type="text" id="description" name="description" placeholder="description" required><br>';
                            echo '<button type="submit" name="inserer" value="inserer">Insérer</button>';
                            echo '</form>';
                            if(isset($_POST['inserer'])) {
                                if($_POST['inserer'] === 'inserer') {
                                    $name = $_POST['name'];
                                    $description = $_POST['description'];

                                    $query = "INSERT INTO Items (name, description) VALUES (?, ?)";
                                    $stmt = $conn->prepare($query);
                                    $stmt->execute(array($name, $description));

                                    echo "Insertion effectuée";
                                }
                            }
                        } elseif($_POST['action'] === 'update') {
                            echo "update";
                        }
                    }
                    break;

                case 11 : 
                    echo "Table Level";
                    echo "<br>";
                    $conn = Database::connect();
                    $query = "SELECT * from Level";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    while($recu = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo $recu['level_id'] . " " . $recu['class_id'] . " " . $recu['level'] . " " . $recu['required_xp'] . " " . $recu['pv_bonus'] . " " . $recu['mana_bonus'] . " " . $recu['strength_bonus'] . " " . $recu['initiative_bonus'] . "<br>";
                    }
                    echo '<form method="post" action="">';
                    echo '<input type="hidden" name="number" value="11">';
                    echo "<br>" . '<button type="submit" name="action" value="insert"> Insert </button>' . " " . '<button type="submit" name="action" value="update"> Update </button>';
                    echo '</form>';
                    if(isset($_POST['action'])) {
                        if($_POST['action'] === 'insert') {
                            echo '<form method="post">';
                            echo '<input type="number" id="class_id" name="class_id" placeholder="class_id" required><br>';
                            echo '<input type="number" id="level" name="level" placeholder="level" required><br>';
                            echo '<input type="number" id="required_xp" name="required_xp" placeholder="required_xp" required><br>';
                            echo '<input type="number" id="pv_bonus" name="pv_bonus" placeholder="pv_bonus" required><br>';
                            echo '<input type="number" id="mana_bonus" name="mana_bonus" placeholder="mana_bonus" required><br>';
                            echo '<input type="number" id="strength_bonus" name="strength_bonus" placeholder="strength_bonus" required><br>';
                            echo '<input type="number" id="initiative_bonus" name="initiative_bonus" placeholder="initiative_bonus" required><br>';
                            echo '<button type="submit" name="inserer" value="inserer">Insérer</button>';
                            echo '</form>';
                            if(isset($_POST['inserer'])) {
                                if($_POST['inserer'] === 'inserer') {
                                    $class_id = $_POST['class_id'];
                                    $level = $_POST['level'];
                                    $required_xp = $_POST['required_xp'];
                                    $pv_bonus = $_POST['pv_bonus'];
                                    $mana_bonus = $_POST['mana_bonus'];
                                    $strength_bonus = $_POST['strength_bonus'];
                                    $initiative_bonus = $_POST['initiative_bonus'];

                                    $query = "INSERT INTO Level (class_id, level, required_xp, pv_bonus, mana_bonus, strength_bonus, initiative_bonus) VALUES (?, ?, ?, ?, ?, ?, ?)";
                                    $stmt = $conn->prepare($query);
                                    $stmt->execute(array($class_id, $level, $required_xp, $pv_bonus, $mana_bonus, $strength_bonus, $initiative_bonus));

                                    echo "Insertion effectuée";
                                }
                            }
                        } elseif($_POST['action'] === 'update') {
                            echo "update";
                        }
                    }
                    break;

                case 12 : 
                    echo "Table Links";
                    echo "<br>";
                    $conn = Database::connect();
                    $query = "SELECT * from Links";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    while($recu = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo $recu['link_id'] . " " . $recu['chapter_id'] . " " . $recu['next_chapter_id'] . " " . $recu['description'] . "<br>";
                    }
                    echo '<form method="post" action="">';
                    echo '<input type="hidden" name="number" value="12">';
                    echo "<br>" . '<button type="submit" name="action" value="insert"> Insert </button>' . " " . '<button type="submit" name="action" value="update"> Update </button>';
                    echo '</form>';
                    if(isset($_POST['action'])) {
                        if($_POST['action'] === 'insert') {
                            echo '<form method="post">';
                            echo '<input type="number" id="chapter_id" name="chapter_id" placeholder="chapter_id" required><br>';
                            echo '<input type="number" id="next_chapter_id" name="next_chapter_id" placeholder="next_chapter_id" required><br>';
                            echo '<input type="text" id="description" name="description" placeholder="description" required><br>';
                            echo '<button type="submit" name="inserer" value="inserer">Insérer</button>';
                            echo '</form>';
                            if(isset($_POST['inserer'])) {
                                if($_POST['inserer'] === 'inserer') {
                                    $chapter_id = $_POST['chapter_id'];
                                    $next_chapter_id = $_POST['next_chapter_id'];
                                    $description = $_POST['description'];

                                    $query = "INSERT INTO Links (chapter_id, next_chapter_id, description) VALUES (?, ?, ?)";
                                    $stmt = $conn->prepare($query);
                                    $stmt->execute(array($chapter_id, $next_chapter_id, $description));

                                    echo "Insertion effectuée";
                                }
                            }
                        } elseif($_POST['action'] === 'update') {
                            echo "update";
                        }
                    }
                    break;
                
                case 13 : 
                    echo "Table Loot";
                    echo "<br>";
                    $conn = Database::connect();
                    $query = "SELECT * from Loot";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    while($recu = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo $recu['loot_id'] . " " . $recu['monster_id'] . " " . $recu['item_id'] . " " . $recu['quantity'] . " " . $recu['probability'] . " " . $recu['class_id'] . "<br>";
                    }
                    echo '<form method="post" action="">';
                    echo '<input type="hidden" name="number" value="13">';
                    echo "<br>" . '<button type="submit" name="action" value="insert"> Insert </button>' . " " . '<button type="submit" name="action" value="update"> Update </button>';
                    echo '</form>';
                    if(isset($_POST['action'])) {
                        if($_POST['action'] === 'insert') {
                            echo '<form method="post">';
                            echo '<input type="number" id="monster_id" name="monster_id" placeholder="monster_id" required><br>';
                            echo '<input type="number" id="item_id" name="item_id" placeholder="item_id" required><br>';
                            echo '<input type="number" id="quantity" name="quantity" placeholder="quantity" required><br>';
                            echo '<input type="number" id="probability" name="probability" placeholder="probability" required><br>';
                            echo '<input type="number" id="class_id" name="class_id" placeholder="class_id" required><br>';
                            echo '<button type="submit" name="inserer" value="inserer">Insérer</button>';
                            echo '</form>';
                            if(isset($_POST['inserer'])) {
                                if($_POST['inserer'] === 'inserer') {
                                    $monster_id = $_POST['monster_id'];
                                    $item_id = $_POST['item_id'];
                                    $required_xp = $_POST['quantity'];
                                    $probability = $_POST['probability'];
                                    $class_id = $_POST['class_id'];
                                    $initiative = $_POST['strength_bonus'];
                                    $initiative_bonus = $_POST['initiative_bonus'];

                                    $query = "INSERT INTO Loot (monster_id, item_id, quantity, probability, class_id) VALUES (?, ?, ?, ?, ?)";
                                    $stmt = $conn->prepare($query);
                                    $stmt->execute(array($monster_id, $item_id, $quantity, $probability, $class_id));

                                    echo "Insertion effectuée";
                                }
                            }
                        } elseif($_POST['action'] === 'update') {
                            echo "update";
                        }
                    }
                    break;

                case 14 : 
                    echo "Table Monster";
                    echo "<br>";
                    $conn = Database::connect();
                    $query = "SELECT * from Monster";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    while($recu = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo $recu['monster_id'] . " " . $recu['name'] . " " . $recu['pv'] . " " . $recu['mana'] . " " . $recu['initiative'] . " " . $recu['strength'] . " " . $recu['attack'] . " " . $recu['xp'] . "<br>";
                    }
                    echo '<form method="post" action="">';
                    echo '<input type="hidden" name="number" value="14">';
                    echo "<br>" . '<button type="submit" name="action" value="insert"> Insert </button>' . " " . '<button type="submit" name="action" value="update"> Update </button>';
                    echo '</form>';
                    if(isset($_POST['action'])) {
                        if($_POST['action'] === 'insert') {
                            echo '<form method="post">';
                            echo '<input type="text" id="name" name="name" placeholder="name" required><br>';
                            echo '<input type="number" id="pv" name="pv" placeholder="pv" required><br>';
                            echo '<input type="number" id="mana" name="mana" placeholder="mana" required><br>';
                            echo '<input type="number" id="initiative" name="initiative" placeholder="initiative" required><br>';
                            echo '<input type="number" id="strength" name="strength" placeholder="strength" required><br>';
                            echo '<input type="text" id="attack" name="attack" placeholder="attack" required><br>';
                            echo '<input type="number" id="xp" name="xp" placeholder="xp" required><br>';
                            echo '<button type="submit" name="inserer" value="inserer">Insérer</button>';
                            echo '</form>';
                            if(isset($_POST['inserer'])) {
                                if($_POST['inserer'] === 'inserer') {
                                    $name = $_POST['name'];
                                    $pv = $_POST['pv'];
                                    $mana = $_POST['mana'];
                                    $initiative = $_POST['initiative'];
                                    $strength = $_POST['strength'];
                                    $attack = $_POST['attack'];
                                    $xp = $_POST['xp'];

                                    $query = "INSERT INTO Monster (name, pv, mana, initiative, strength, attack, xp) VALUES (?, ?, ?, ?, ?, ?, ?)";
                                    $stmt = $conn->prepare($query);
                                    $stmt->execute(array($name, $pv, $mana, $initiative, $strength, $attack, $xp));

                                    echo "Insertion effectuée";
                                }
                            }
                        } elseif($_POST['action'] === 'update') {
                            echo "update";
                        }
                    }
                    break;

                case 15 : 
                    echo "Table Potion";
                    echo "<br>";
                    $conn = Database::connect();
                    $query = "SELECT * from Potion";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    while($recu = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo $recu['potion_id'] . " " . $recu['item_id'] . " " . $recu['type'] . " " . $recu['heal_amount'] . " " . $recu['mana_recovery'] . "<br>";
                    }
                    echo '<form method="post" action="">';
                    echo '<input type="hidden" name="number" value="15">';
                    echo "<br>" . '<button type="submit" name="action" value="insert"> Insert </button>' . " " . '<button type="submit" name="action" value="update"> Update </button>';
                    echo '</form>';
                    if(isset($_POST['action'])) {
                        if($_POST['action'] === 'insert') {
                            echo '<form method="post">';
                            echo '<input type="number" id="item_id" name="item_id" placeholder="item_id" required><br>';
                            echo '<input type="text" id="type" name="type" placeholder="type" required><br>';
                            echo '<input type="number" id="heal_amount" name="heal_amount" placeholder="heal_amount" required><br>';
                            echo '<input type="number" id="mana_recovery" name="mana_recovery" placeholder="mana_recovery" required><br>';
                            echo '<button type="submit" name="inserer" value="inserer">Insérer</button>';
                            echo '</form>';
                            if(isset($_POST['inserer'])) {
                                if($_POST['inserer'] === 'inserer') {
                                    $item_id = $_POST['item_id'];
                                    $type = $_POST['type'];
                                    $heal_amount = $_POST['heal_amount'];
                                    $mana_recovery = $_POST['mana_recovery'];
                                    $strength = $_POST['strength'];
                                    $attack = $_POST['attack'];
                                    $xp = $_POST['xp'];

                                    $query = "INSERT INTO Potion (item_id, type, heal_amount, mana_recovery) VALUES (?, ?, ?, ?)";
                                    $stmt = $conn->prepare($query);
                                    $stmt->execute(array($item_id, $type, $heal_amount, $mana_recovery));

                                    echo "Insertion effectuée";
                                }
                            }
                        } elseif($_POST['action'] === 'update') {
                            echo "update";
                        }
                    }
                    break;
                
                case 16 : 
                    echo "Table Scroll";
                    echo "<br>";
                    $conn = Database::connect();
                    $query = "SELECT * from Scroll";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    while($recu = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo $recu['scroll_id'] . " " . $recu['item_id'] . " " . $recu['spell_id'] . "<br>";
                    }
                    echo '<form method="post" action="">';
                    echo '<input type="hidden" name="number" value="16">';
                    echo "<br>" . '<button type="submit" name="action" value="insert"> Insert </button>' . " " . '<button type="submit" name="action" value="update"> Update </button>';
                    echo '</form>';
                    if(isset($_POST['action'])) {
                        if($_POST['action'] === 'insert') {
                            echo '<form method="post">';
                            echo '<input type="number" id="item_id" name="item_id" placeholder="item_id" required><br>';
                            echo '<input type="number" id="spell_id" name="spell_id" placeholder="spell_id" required><br>';
                            echo '<button type="submit" name="inserer" value="inserer">Insérer</button>';
                            echo '</form>';
                            if(isset($_POST['inserer'])) {
                                if($_POST['inserer'] === 'inserer') {
                                    $item_id = $_POST['item_id'];
                                    $spell_id = $_POST['spell_id'];

                                    $query = "INSERT INTO Scroll (item_id, spell_id) VALUES (?, ?)";
                                    $stmt = $conn->prepare($query);
                                    $stmt->execute(array($item_id, $spell_id));

                                    echo "Insertion effectuée";
                                }
                            }
                        } elseif($_POST['action'] === 'update') {
                            echo "update";
                        }
                    }
                    break;
                
                case 17 : 
                    echo "Table Shield";
                    echo "<br>";
                    $conn = Database::connect();
                    $query = "SELECT * from Shield";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    while($recu = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo $recu['shield_id'] . " " . $recu['item_id'] . " " . $recu['armor_bonus'] . "<br>";
                    }
                    echo '<form method="post" action="">';
                    echo '<input type="hidden" name="number" value="17">';
                    echo "<br>" . '<button type="submit" name="action" value="insert"> Insert </button>' . " " . '<button type="submit" name="action" value="update"> Update </button>';
                    echo '</form>';
                    if(isset($_POST['action'])) {
                        if($_POST['action'] === 'insert') {
                            echo '<form method="post">';
                            echo '<input type="number" id="item_id" name="item_id" placeholder="item_id" required><br>';
                            echo '<input type="number" id="armor_bonus" name="armor_bonus" placeholder="armor_bonus" required><br>';
                            echo '<button type="submit" name="inserer" value="inserer">Insérer</button>';
                            echo '</form>';
                            if(isset($_POST['inserer'])) {
                                if($_POST['inserer'] === 'inserer') {
                                    $item_id = $_POST['item_id'];
                                    $armor_bonus = $_POST['armor_bonus'];

                                    $query = "INSERT INTO Shield (item_id, armor_bonus) VALUES (?, ?)";
                                    $stmt = $conn->prepare($query);
                                    $stmt->execute(array($item_id, $armor_bonus,));

                                    echo "Insertion effectuée";
                                }
                            }
                        } elseif($_POST['action'] === 'update') {
                            echo "update";
                        }
                    }
                    break;

                case 18 : 
                    echo "Table Spell";
                    echo "<br>";
                    $conn = Database::connect();
                    $query = "SELECT * from Spell";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    while($recu = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo $recu['spell_id'] . " " . $recu['name'] . " " . $recu['description'] . " " . $recu['cost'] . " " . $recu['level_needed'] . "<br>";
                    }
                    echo '<form method="post" action="">';
                    echo '<input type="hidden" name="number" value="18">';
                    echo "<br>" . '<button type="submit" name="action" value="insert"> Insert </button>' . " " . '<button type="submit" name="action" value="update"> Update </button>';
                    echo '</form>';
                    if(isset($_POST['action'])) {
                        if($_POST['action'] === 'insert') {
                            echo '<form method="post">';
                            echo '<input type="text" id="name" name="name" placeholder="name" required><br>';
                            echo '<input type="text" id="description" name="description" placeholder="description" required><br>';
                            echo '<input type="number" id="cost" name="cost" placeholder="cost" required><br>';
                            echo '<input type="number" id="level_needed" name="level_needed" placeholder="level_needed" required><br>';
                            echo '<button type="submit" name="inserer" value="inserer">Insérer</button>';
                            echo '</form>';
                            if(isset($_POST['inserer'])) {
                                if($_POST['inserer'] === 'inserer') {
                                    $name = $_POST['name'];
                                    $description = $_POST['description'];
                                    $cost = $_POST['cost'];
                                    $level_needed = $_POST['level_needed'];

                                    $query = "INSERT INTO Spell (name, description, cost, level_needed) VALUES (?, ?, ?, ?)";
                                    $stmt = $conn->prepare($query);
                                    $stmt->execute(array($name, $description, $cost, $level_needed));

                                    echo "Insertion effectuée";
                                }
                            }
                        } elseif($_POST['action'] === 'update') {
                            echo "update";
                        }
                    }
                    break;

                case 19 : 
                    echo "Table Spell_List";
                    echo "<br>";
                    $conn = Database::connect();
                    $query = "SELECT * from Spell_list";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    while($recu = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo $recu['spell_list_id'] . " " . $recu['spell_id'] . " " . $recu['class_id'] . " " . $recu['monster_id'] . "<br>";
                    }
                    echo '<form method="post" action="">';
                    echo '<input type="hidden" name="number" value="19">';
                    echo "<br>" . '<button type="submit" name="action" value="insert"> Insert </button>' . " " . '<button type="submit" name="action" value="update"> Update </button>';
                    echo '</form>';
                    if(isset($_POST['action'])) {
                        if($_POST['action'] === 'insert') {
                            echo '<form method="post">';
                            echo '<input type="number" id="spell_id" name="spell_id" placeholder="spell_id" required><br>';
                            echo '<input type="number" id="class_id" name="class_id" placeholder="class_id" required><br>';
                            echo '<input type="number" id="monster_id" name="monster_id" placeholder="monster_id" required><br>';
                            echo '<button type="submit" name="inserer" value="inserer">Insérer</button>';
                            echo '</form>';
                            if(isset($_POST['inserer'])) {
                                if($_POST['inserer'] === 'inserer') {
                                    $spell_id = $_POST['spell_id'];
                                    $class_id = $_POST['class_id'];
                                    $monster_id = $_POST['monster_id'];

                                    $query = "INSERT INTO Spell_list (spell_id, class_id, monster_id) VALUES (?, ?, ?)";
                                    $stmt = $conn->prepare($query);
                                    $stmt->execute(array($spell_id, $class_id, $monster_id));

                                    echo "Insertion effectuée";
                                }
                            }
                        } elseif($_POST['action'] === 'update') {
                            echo "update";
                        }
                    }
                    break;

                case 20 : 
                    echo "Table Sword";
                    echo "<br>";
                    $conn = Database::connect();
                    $query = "SELECT * from Sword";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    while($recu = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo $recu['sword_id'] . " " . $recu['item_id'] . " " . $recu['damage_bonus'] . " " . $recu['type'] . "<br>";
                    }
                    echo '<form method="post" action="">';
                    echo '<input type="hidden" name="number" value="20">';
                    echo "<br>" . '<button type="submit" name="action" value="insert"> Insert </button>' . " " . '<button type="submit" name="action" value="update"> Update </button>';
                    echo '</form>';
                    if(isset($_POST['action'])) {
                        if($_POST['action'] === 'insert') {
                            echo '<form method="post">';
                            echo '<input type="number" id="item_id" name="item_id" placeholder="item_id" required><br>';
                            echo '<input type="number" id="damage_bonus" name="damage_bonus" placeholder="damage_bonus" required><br>';
                            echo '<input type="text" id="type" name="type" placeholder="type" required><br>';
                            echo '<button type="submit" name="inserer" value="inserer">Insérer</button>';
                            echo '</form>';
                            if(isset($_POST['inserer'])) {
                                if($_POST['inserer'] === 'inserer') {
                                    $item_id = $_POST['item_id'];
                                    $damage_bonus = $_POST['damage_bonus'];
                                    $type = $_POST['type'];

                                    $query = "INSERT INTO Sword (item_id, damage_bonus, type) VALUES (?, ?, ?)";
                                    $stmt = $conn->prepare($query);
                                    $stmt->execute(array($item_id, $damage_bonus, $type));

                                    echo "Insertion effectuée";
                                }
                            }
                        } elseif($_POST['action'] === 'update') {
                            echo "update";
                        }
                    }
                    break;

                default: 
                    echo "Aucune valeur";
                    break;
            }
        }

        if (!defined('BASE_URL')) {
            define('BASE_URL', '/DungeonXplorer');
        }
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        require_once 'views/afficher_bdd.php';
    }
}
?>