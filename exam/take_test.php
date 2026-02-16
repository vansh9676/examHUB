<?php 
include_once('../includes/header.php'); 
include_once('../includes/db_connect.php'); 

$mock_id = isset($_GET['id']) ? (int)$_GET['id'] : 1;

$info_query = "SELECT m.*, c.category_name, m.category_id FROM mocks m 
               JOIN categories c ON m.category_id = c.id 
               WHERE m.id = '$mock_id' LIMIT 1";
$info_result = mysqli_query($conn, $info_query);
$mock = mysqli_fetch_assoc($info_result);

if (!$mock) {
    echo "<div class='container my-5'><h2>Exam not found.</h2></div>";
    exit();
}

// Fetch questions and group them by subcategory
$q_sql = "SELECT * FROM questions WHERE mock_id = '$mock_id' ORDER BY subcategory ASC LIMIT 100";
$q_result = mysqli_query($conn, $q_sql);
$total_q = mysqli_num_rows($q_result);

$questions_by_sub = [];
$q_to_sub_map = []; // NEW: Map question number to its section for palette logic
$global_count = 1;

while($row = mysqli_fetch_assoc($q_result)) {
    $sub = !empty($row['subcategory']) ? strtoupper($row['subcategory']) : 'GENERAL';
    $questions_by_sub[$sub][] = $row;
    $q_to_sub_map[$global_count] = $sub;
    $global_count++;
}

$duration = (!empty($mock['time_minutes'])) ? $mock['time_minutes'] : 60;
?>

<div class="container-fluid bg-light min-vh-100 py-4">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center bg-white p-3 rounded-4 shadow-sm mb-4 border-bottom border-primary border-3">
            <div>
                <h4 class="fw-bold mb-0"><?php echo $mock['mock_title']; ?></h4>
                <span class="badge bg-primary px-3"><?php echo $mock['category_name']; ?> Syllabus</span>
            </div>
            <div class="text-end">
                <div class="h3 fw-bold mb-0 text-danger" id="timerDisplay">00:00</div>
                <small class="text-muted fw-bold">TIME REMAINING</small>
            </div>
        </div>

        <div class="d-flex bg-white p-2 rounded-4 shadow-sm mb-4 gap-2 overflow-auto">
            <?php 
            $is_first = true;
            foreach(array_keys($questions_by_sub) as $sub_name): ?>
                <button type="button" 
                        id="btn-nav-<?php echo $sub_name; ?>"
                        class="btn <?php echo $is_first ? 'btn-primary' : 'btn-light text-primary'; ?> fw-bold px-4 rounded-3 section-btn" 
                        onclick="showSection('<?php echo $sub_name; ?>', this)">
                    <?php echo $sub_name; ?>
                </button>
            <?php $is_first = false; endforeach; ?>
        </div>

        <div class="row">
            <div class="col-lg-9">
                <form id="examForm" action="submit_test.php" method="POST">
                    <input type="hidden" name="mock_id" value="<?php echo $mock_id; ?>">
                    
                    <div id="questions-container">
                        <?php
                        $q_num = 1;
                        $pane_first = true;
                        foreach($questions_by_sub as $sub_name => $qs): ?>
                            <div class="question-section" id="section-<?php echo $sub_name; ?>" style="display: <?php echo $pane_first ? 'block' : 'none'; ?>;">
                                <?php foreach($qs as $q): ?>
                                    <div class="card border-0 shadow-sm rounded-4 p-4 mb-4" id="q_<?php echo $q_num; ?>">
                                        <div class="d-flex justify-content-between mb-3">
                                            <span class="badge bg-light text-primary border">Section: <?php echo $sub_name; ?></span>
                                            <span class="text-muted small">Marks: +2.0, -0.5</span>
                                        </div>
                                        <h5 class="fw-bold mb-3">Q<?php echo $q_num; ?>. <?php echo $q['question_text']; ?></h5>
                                        <div class="row g-3">
                                            <?php foreach(['a','b','c','d'] as $o): ?>
                                            <div class="col-md-6">
                                                <label class="d-block p-3 border rounded-3 option-hover-effect" style="cursor: pointer;">
                                                    <input type="radio" name="q<?php echo $q['id']; ?>" value="<?php echo $o; ?>" class="me-2" onclick="markAnswered(<?php echo $q_num; ?>)">
                                                    <span class="fw-bold me-1"><?php echo strtoupper($o); ?>.</span>
                                                    <?php echo $q['option_'.$o]; ?>
                                                </label>
                                            </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                <?php $q_num++; endforeach; ?>
                            </div>
                        <?php $pane_first = false; endforeach; ?>
                    </div>
                    
                    <div class="text-center mb-5">
                        <button type="submit" class="btn btn-success btn-lg px-5 rounded-pill shadow fw-bold">Submit Final Exam</button>
                    </div>
                </form>
            </div>

            <div class="col-lg-3">
                <div class="card border-0 shadow-sm rounded-4 p-3 sticky-top" style="top:20px;">
                    <h6 class="fw-bold mb-3">Question Palette (<?php echo $total_q; ?> Questions)</h6>
                    <div class="d-flex flex-wrap gap-1 mb-3">
                        <?php for($i=1; $i<=$total_q; $i++): 
                            $target_sub = $q_to_sub_map[$i];
                        ?>
                            <button type="button" 
                                    id="palette_btn_<?php echo $i; ?>" 
                                    class="btn btn-sm btn-outline-secondary palette-link" 
                                    style="width:34px; height:34px; font-size:11px; display:flex; align-items:center; justify-content:center;"
                                    onclick="jumpToQuestion('<?php echo $target_sub; ?>', <?php echo $i; ?>)">
                                <?php echo $i; ?>
                            </button>
                        <?php endfor; ?>
                    </div>
                    <hr>
                    <div class="small">
                        <div class="d-flex align-items-center mb-1"><span class="badge bg-success me-2">&nbsp;</span> Answered</div>
                        <div class="d-flex align-items-center"><span class="badge bg-outline-secondary border text-dark me-2">#</span> Not Answered</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .option-hover-effect:hover { background-color: #f0f7ff; border-color: #0d6efd !important; }
    .option-hover-effect:has(input:checked) { background-color: #e7f1ff; border-color: #0d6efd !important; font-weight: bold; }
    .palette-link.btn-success { background-color: #198754 !important; color: white !important; border-color: #198754 !important; }
    .section-btn.btn-primary { box-shadow: 0 4px 12px rgba(13, 110, 253, 0.2); }
</style>

<script>
// JSON map of questions to sections for JS use
const qSubMap = <?php echo json_encode($q_to_sub_map); ?>;

function showSection(sectionId, btn) {
    document.querySelectorAll('.question-section').forEach(section => {
        section.style.display = 'none';
    });
    document.getElementById('section-' + sectionId).style.display = 'block';

    document.querySelectorAll('.section-btn').forEach(b => {
        b.classList.remove('btn-primary');
        b.classList.add('btn-light', 'text-primary');
    });
    
    if(btn) {
        btn.classList.remove('btn-light', 'text-primary');
        btn.classList.add('btn-primary');
    }
}

// FIXED JUMP LOGIC: Switches section AND scrolls to question
function jumpToQuestion(sectionId, qNum) {
    // 1. Switch to the correct section first
    const targetBtn = document.getElementById('btn-nav-' + sectionId);
    showSection(sectionId, targetBtn);
    
    // 2. Scroll to the specific question
    const qElement = document.getElementById('q_' + qNum);
    if(qElement) {
        qElement.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }
}

// TIMER LOGIC
let secondsLeft = <?php echo $duration; ?> * 60;
const display = document.querySelector('#timerDisplay');

const timer = setInterval(function () {
    let minutes = Math.floor(secondsLeft / 60);
    let seconds = secondsLeft % 60;
    display.textContent = (minutes < 10 ? "0" + minutes : minutes) + ":" + (seconds < 10 ? "0" + seconds : seconds);
    if (--secondsLeft < 0) {
        clearInterval(timer);
        document.getElementById('examForm').submit();
    }
}, 1000);

function markAnswered(qNum) {
    const btn = document.getElementById('palette_btn_' + qNum);
    if (btn) {
        btn.classList.remove('btn-outline-secondary');
        btn.classList.add('btn-success', 'text-white');
    }
}
</script>

<?php include_once('../includes/footer.php'); ?>