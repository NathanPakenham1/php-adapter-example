<?php

/*
 *
 * MediaPlayer Interface: Defines the method to play audio.
   AdvancedMediaPlayer Interface: Defines methods to play different formats.
   VlcPlayer and Mp4Player Classes: Implement the AdvancedMediaPlayer interface.
   MediaAdapter Class: Implements the MediaPlayer interface and uses AdvancedMediaPlayer to play different formats.
   AudioPlayer Class: Uses MediaAdapter to play different formats.
   Client Code: Demonstrates how the client uses the AudioPlayer to play different audio formats.
 *
 */

interface MediaPlayer {
    public function play(string $audioType, string $fileName): void;
}

class VlcPlayer implements MediaPlayer {
    public function play(string $audioType, string $fileName): void {
        if ($audioType == 'vlc') {
            echo 'Playing vlc file name:' . $fileName . '<br>';
        }
    }
}

class Mp4Player implements MediaPlayer {
    public function play(string $audioType, string $fileName): void {
        if ($audioType == 'mp4') {
            echo 'Playing mp4 file name:' . $fileName . '<br>';
        }
    }
}

class AudioPlayer implements MediaPlayer {
    private $mediaAdapter;

    public function play(string $audioType, string $fileName): void {
        if ($audioType == 'mp3') {
            echo 'Playing mp3 file name:' . $fileName . '<br>';
        } elseif ($audioType == 'vlc') {
            $this->mediaAdapter = new VlcPlayer();
            $this->mediaAdapter->play($audioType, $fileName);
        } elseif ($audioType == 'mp4') {
            $this->mediaAdapter = new Mp4Player();
            $this->mediaAdapter->play($audioType, $fileName);
        } else {
            echo 'Invalid audio file type:' . $audioType . '<br>';
        }
    }
}

$audioPlayer = new AudioPlayer();

$audioPlayer->play('mp3', 'test.mp3');

